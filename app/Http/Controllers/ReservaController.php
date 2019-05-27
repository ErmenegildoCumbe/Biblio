<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biblioteca\Reserva;
use Auth;
use App\Biblioteca\Livro;
use App\User;
use App\Biblioteca\Emprestimo;

class ReservaController extends Controller
{
             /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::where('estado', null)->get();
        return view('reservas.index',compact('reservas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserva.create'); 
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
            'nr_estudante' => 'required|string|max:8',
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
            $reserva = new Reserva; 
            $reserva->estudante_id = $estudante->id;
            $reserva->bibliotecario_id = Auth::id();
            $reserva->livro_id = $livro->id;
            $reserva->save();
           return redirect()->route('livro.index')->with('success', 'Reserva Efectuada com sucesso!!');
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
        $reserva = Reserva::findOrFail();
        $reserva->delete();
        return redirect()->route('reserva.index');
    }
    public function criar($id){
        $livro = Livro::findOrFail($id);
        if ($livro->estado == 1) {
            return view('reservas.create', compact('livro'));
        }
        else {
            return redirect()->back()->with('error', 'Livro indisponível');
        }

    }
    public function irConfirmar($id){
        $reserva = Reserva::findOrFail($id);
        return view('reservas.confirmar_reserva', compact('reserva'));
       
    }
    public function confirmar($id, Request $request){
        $reserva = Reserva::findOrFail($id);
        $livro = $reserva->livro;
        if($livro->estado == 1){
            $emprestimo = new Emprestimo; 
           $emprestimo->data_entrega = date_create($request->data_entrega);
           $emprestimo->estudante_id = $reserva->estudante_id;
           $emprestimo->livro_id = $livro->id;
           $emprestimo->bibliotecario_id = Auth::id();
           $emprestimo->estado = null;
           $emprestimo->save();
           $livro->estado = 2;
           $livro->save();
           $reserva->estado = 1;
           $reserva->save();
           return redirect()->route('reserva.index')->with('success', 'Reserva confirmada com sucesso!!');
        }
        return redirect()->back()->with('error', 'Livro indisponível');
    }
    
}
