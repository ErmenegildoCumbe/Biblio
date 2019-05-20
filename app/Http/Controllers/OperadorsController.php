<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPermission;
use App\User;
use App\Operador;
use App\Administrador;
use Auth;

class OperadorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operadores = Operador::with('user')->get();

       return view('utilizadores.users', compact('operadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $user = new User;
        $operador = new Operador;
        $admin = new Administrador;
        $userpermission = new UserPermission;
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->apelido = $request->apelido;
        $user->telefone = $request->telefone;
        $user->tipoUsuario = $request->tipo;
        $user->estado = 1;
        $user->save();
        //verificacao do tipo de user a ser gravado
        if($request->tipo == 2){
            $operador->estado = 1;
            $administrador = Administrador::where('users_id', Auth::id())->get();
            $operador->administradors_id =$administrador[0]->id;
            $operador->users_id = $user->id;
            $operador->save();
            $userpermission->permission_id = 2;
            $userpermission->user_id = $user->id;
            $userpermission->save();
            return view('utilizadores.create'); 
        }
        else{
            $admin->estado = 1;
            $admin->users_id = $user->id;
            $admin->save();
            $userpermission->permission_id = 1;
            $userpermission->user_id = $user->id;
            $userpermission->save();
            return view('utilizadores.create'); 
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function validation($request){
        return $this->validate($request, [
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:6',
         'nome' =>'required|string|max:145',
         'apelido' =>'string|max:45',
         'telefone' =>'nullable|string|max:15',
         'tipo' =>'max:1',
        ]);
    }
    public function storeajax(Request $request){
        $this->validation($request);
        $user = new User;
        $operador = new Operador;
        $admin = new Administrador;
        $userpermission = new UserPermission;
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->apelido = $request->apelido;
        $user->telefone = $request->telefone;
        $user->tipoUsuario = $request->tipo;
        $user->estado = 1;
        $user->save();
        //verificacao do tipo de user a ser gravado
        if($request->tipo == 2){
            $operador->estado = 1;
            $administrador = Administrador::where('users_id', Auth::id())->get();
            $operador->administradors_id =$administrador[0]->id;;
            $operador->users_id = $user->id;
            $operador->save();
            $userpermission->permission_id = 2;
            $userpermission->user_id = $user->id;
            $userpermission->save();
            return 1; 
        }
        else{
            $admin->estado = 1;
            $admin->users_id = $user->id;
            $admin->save();
            $userpermission->permission_id = 1;
            $userpermission->user_id = $user->id;
            $userpermission->save();
            return 1; 
        }

    }
    public function editstatus($id){
        $operator = Operador::find($id);
        if ($operator->estado == 1) {
            $operator->estado = 2;
        } else {
            $operator->estado = 1;
        }   
        $operator->save();
        $user = User::find($operator->users_id);
        $user->estado = $operator->estado;
        $user->save(); 
        return 1;
    }
}
