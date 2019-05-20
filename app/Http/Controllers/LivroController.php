<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biblioteca\Livro;
use Auth;

class LivroController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::where('estado', 1)->get();
        return view('livros.index',compact('livros')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livros.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'   => 'required|string|max:100|min:6',
            'autor'    => 'required|string|max:50',
            'editora' => 'required|string',
            'edicao'  => 'string',
            'ano_publicacao'  => 'required|Date',
        ]);
        $livro =  new Livro;
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->editora = $request->editora;
        $livro->edicao = $request->edicao;
        $livro->ano_publicacao = date_create($request->ano_publicacao);
        $livro->bibliotecario_id = Auth::id();
        $livro->save();
        return redirect()->back();        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $fotos = PacoteViagem::findOrFail($id)->fotos;
        // $pacote = PacoteViagem::findOrFail($id);
        // return view('pacotes.detalhes', compact('fotos','pacote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        return view('livros.edit',compact('livro')); 
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
        $request->validate([
            'titulo'   => 'required|string|max:100|min:6',
            'autor'    => 'required|string|max:50',
            'editora' => 'required|string',
            'edicao'  => 'string',
            'ano_publicacao'  => 'required|Date',
        ]);
        $livro = Livro::findOrFail($id);
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->editora = $request->editora;
        $livro->edicao = $request->edicao;
        $livro->ano_publicacao = date_create($request->ano_publicacao);
        $livro->bibliotecario_id = Auth::id();
        $livro->save();
        return redirect()->route('livro.index');        
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
    public function desactivar($id){
        $livro = Livro::findOrFail($id);
        $livro->estado = 2;
        $livro->save();
        return redirect()->back(); 
    }
    public function indisponiveis(){
        $livros = Livro::where('estado', 2)->get();
        return view('livros.indisponiveis',compact('livros')); 
    }
}
