<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cliente;
use App\UserPermission;
use Auth;
use Socialite;
use App\SocialProvider;

class CustomAuthController extends Controller
{
   public function showLoginForm(){
       return view('authentication.login');
   }
   public function register(Request $request){
       $this->validation($request);
       $cliente = new Cliente;
       $user = new User;
       $userpermission = new UserPermission;
       $user->nome = $request->fname;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->apelido = $request->lname;
       $user->telefone = $request->phone;
       $user->tipoUsuario = 3;
       $user->estado = 1;
       $user->save();
       //gravar cliente
       $cliente->estado = 1;
       $cliente->tipoCliente = 1;
       $cliente->users_id = $user->id;
       $cliente->save();
       $userpermission->permission_id = 3;
       $userpermission->user_id = $user->id;
       $userpermission->save();
       Auth::login($user, true);
       return redirect('/home');

   }
   public function login(Request $request){
       $this->validate($request, [
        'email' => 'required|email|max:255',
        'pass' => 'requiredmax:255',
       ]);
       $remember = false;
       if(isset($request->remember)){
        $remember = true;
       }
       
       if( Auth::attempt(['email' => $request->email, 'password' => $request->password, 'estado' =>1], $remember)){
        return redirect('/home');
       }
    else{
       // return 
        return redirect()->back()->withInput( $request->only('email', 'remember') );
         
    }
   }
   public function logout(){
        Auth::logout();
        return redirect('/login');
   }
   protected function validation($request){
       return $this->validate($request, [
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'fname' =>'required|string|max:145',
        'lname' =>'string|max:45',
        'phone' =>'nullable|string|max:15',
       ]);
   }
   public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
        try
        {
            $socialUser = Socialite::driver($service)->stateless()->user();
        }
        catch(\Exception $e)
        {
            return redirect('/');
        }
        //$user = Socialite::driver($service)->stateless()->user();
        $socialProvider = SocialProvider::where('client_id', $socialUser->getId())->first();
        // $user->token;
        if (!$socialProvider) {            
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['nome' => $socialUser->getName()]                
            );
            $aa = $user->socialProviders()->create(
                ['client_id' => $socialUser->getId(), 'provider' => $service, 'users_id' => $user->id]
            );
            //Save userpermissions
            $userpermission = new UserPermission;
            $userpermission->permission_id = 3;
            $userpermission->user_id = $user->id;
            $userpermission->save();
            //Save Cliente
            $cliente = new Cliente;
            $cliente->estado = 1;
            $cliente->tipoCliente = 1;
            $cliente->users_id = $user->id;
            $cliente->save();
         }
         else
             $user = $socialProvider->user;
             auth()->login($user);
             return redirect('/home');
 
    }
}
