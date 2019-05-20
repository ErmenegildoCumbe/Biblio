<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\PacoteViagem;
use App\Operador;
use App\FotoPacote;
use Auth;

class PacoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacotes = PacoteViagem::All();
        return view('pacotes.index',compact('pacotes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacotes.create'); 
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
        $pacote =  new PacoteViagem;
        $pacote->designacao = $request->designacao;
        $pacote->descricao = $request->descricao;
        $pacote->data_inicio = date_create($request->start);
        $pacote->data_fim = date_create($request->end);
        $pacote->estado = 1;
        $pacote->local = $request->local;
        $operadores = Operador::where('users_id',  Auth::id())->get();
        $pacote->operadors_id = $operadores[0]->id;
        $pacote->save();
        return redirect()->route('pacoteimages', ['id' => $pacote->id]);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fotos = PacoteViagem::findOrFail($id)->fotos;
        $pacote = PacoteViagem::findOrFail($id);
        return view('pacotes.detalhes', compact('fotos','pacote'));
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
         'designacao' => 'required|string|max:55',
         'descricao' => 'required|string',
         'start' =>'required|date',
         'end' =>'required|date',
         'local' =>'required|string|max:115',         
        ]);
    }
    public function addimages(Request $request){
        $this->validate($request, [
            'img1' => 'nullable|image',
            'img2' => 'nullable|image',
           ]);
        $foto =  new FotoPacote;
        $foto1 = new FotoPacote;
        if(isset($request->img1)){
            $path = $request->img1->store('public/images/pacotes');
            $arrayy = explode("/",$path);            
            $foto->designacao = "storage/images/pacotes/".$arrayy[3];
            $foto->pacote_viagems_id = $request->pacotecod;
            $foto->tipo = 1;
            $foto->save();
            $pacote = PacoteViagem::find( $foto->pacote_viagems_id);
            //if($pacote->imagem_principal == ''){
                $pacote->imagem_principal = $foto->designacao;
            //}
        }
        if(isset($request->img2)){
            $path2 = $request->img2->store('public/images/pacotes');
            $array = explode("/",$path2);
            $array[0] = "storage";
            $foto1->designacao = $array[0]."/".$array[1]."/".$array[2]."/".$array[3];
            $foto1->pacote_viagems_id = $request->pacotecod;
            $foto1->tipo = 1;
            $foto1->save();
            //$pacote = PacoteViagem::find( $foto1->pacote_viagems_id);
            //if($pacote->imagem_principal == ''){
                $pacote->imagem_principal = $foto1->designacao;
            //}
        }
        return redirect()->back();
    }
    public function showaddimages($id){
        $fotos = PacoteViagem::findOrFail($id)->fotos;
        $pacote = PacoteViagem::findOrFail($id);
        return view('pacotes.editimages', compact('fotos','pacote'));
    }

}
