<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biblioteca\Emprestimo;
use App\Biblioteca\livro;
use App\User;
use Auth;

class EmprestimoController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprestimos = Emprestimo::where('estado', null)->get();
        return view('emprestimos.index',compact('emprestimos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emprestimos.create'); 
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
            'livro'   => 'required|numeric',
            'nome'    => 'required|string|max:80',
            'nr_estudante' => 'required|string',
        ]);
        $livro =  Livro::findOrFail($request->livro);
        $estudante = User::where('nr_estudante', $request->nr_estudante)->first();
        if(!$estudante){
            $estudante = new User;
            $estudante->nome = $request->nome;
            $estudante->nr_estudante = $request->nr_estudante;
            $estudante->save();
        }
        if ($estudante && $livro) {
            $emprestimo = new Emprestimo; 
           $emprestimo->data_entrega = date_create($request->data_entrega);
           $emprestimo->estudante_id = $estudante->id;
           $emprestimo->livro_id = $livro->id;
           $emprestimo->bibliotecario_id = Auth::id();
           $emprestimo->save();
           $livro->estado = 2;
           $livro->save();
           return redirect()->route('livro.index');
        }
        abort(404);
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
    public function paginaEmprestar($id){
        $livro = Livro::findOrFail($id);
        return view('emprestimos.create-emprestimo',compact('livro')); 
    }
    public function devolver($id){
        $emprestimo = Emprestimo::findOrFail($id);
        $livro = $emprestimo->livro;
        $livro->estado = 1;
        $livro->save();
        $emprestimo->estado = 1;
        $emprestimo->save();
        return redirect()->route('emprestimo.index');
    }
    public function sucedidos(){
        $emprestimos = Emprestimo::where('estado', 1)->get();
        return view('emprestimos.sucedidos',compact('emprestimos')); 
    }
    public function cancelar($id){
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->estado = 2;
        $emprestimo->save();
        return redirect()->route('emprestimo.index');
    }
    public function cancelados(){
        $emprestimos = Emprestimo::where('estado', 2)->get();
        return view('emprestimos.cancelados',compact('emprestimos')); 
    }
}
