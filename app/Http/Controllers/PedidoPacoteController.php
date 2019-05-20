<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PacoteViagem;
use App\PedidoPacote;
use App\Contacto;
use App\Passageiro;
use App\User;
use Auth;
use App\Cliente;
class PedidoPacoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedidosPacote.create');
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
        $pedido = new PedidoPacote;

        $pedido->nr_viajantes = $request->nrviajantes;
        $pedido->ponto_partida = $request->partida;
        $pedido->ponto_chegada = $request->destino;
        $pedido->meio_transporte = $request->transporte;
        $pedido->data_inicio = date_create($request->start);
        $pedido->data_fim = date_create($request->end);
        $pedido->detalhes = $request->descricao;
        $pedido->estado = 1;        
        $cliente = User::findOrFail(Auth::id())->cliente;
        $pedido->clientes_id = $cliente->id;
        $pedido->save();
        return redirect()->route('pedidoPacote.edit', ['id' => $pedido->id]);
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
        $pedido = PedidoPacote::findOrFail($id);
        $passageiros = $pedido->passageiros;
        $passagens = $pedido->passagens;
        $contacto = $pedido->contacto;
        return view('pedidosPacote.edit', compact('pedido', 'passageiros', 'passagens','contacto'));
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
    //Efectuar pedido de pacote de viagem atravês da lista de pacotes
    public function viaPacote(Request $request, $id){
        $this->validate($request, [
            'nrviajantes' => 'required|numeric|max:99',
            'meiotransport' => 'nullable|alpha_num|max:55',
            'pontopartida' => 'required|alpha_num|max:55',
            'start' => 'required|date',
            'end' => 'required|date',
            'descricao' => 'nullable|string',
           ]);
           $pacote = PacoteViagem::findOrFail($id);
           $pedido = new PedidoPacote;

           $pedido->nr_viajantes = $request->nrviajantes;
           $pedido->ponto_partida = $request->pontopartida;
           $pedido->ponto_chegada = $pacote->local;
           $pedido->meio_transporte = $request->meiotransport;
           $pedido->data_inicio = date_create($request->start);
           $pedido->data_fim = date_create($request->end);
           $pedido->detalhes = $request->descricao;
           $pedido->estado = 1;
           $pedido->pacote_id = $pacote->id;
           $cliente = User::findOrFail(Auth::id())->cliente;
           $pedido->clientes_id = $cliente->id;
           $pedido->save();
           return redirect('pacote');
    }
    //Adicionar passageiro
    public function addPassenger(Request $request, $id){
        $this->validate($request, [
            'nome' => 'required|string|max:60',
            'apelido' => 'required|string|max:20',
            'tratamento' => 'required|string|max:20',
            'nascimento' => 'required|date',
            'sexo' => 'required|string',
            'tipoPassageiro' => 'required|numeric|max:3',
           ]);
           $pedido = PedidoPacote::findOrFail($id);
            $passageiro = new Passageiro;
            $passageiro->nome = $request->nome;
            $passageiro->apelido = $request->apelido;
            $passageiro->forma_tratamento = $request->tratamento;
            $passageiro->data_nascimento = date_create($request->nascimento);
            $passageiro->sexo = $request->sexo;
            $passageiro->tipo = $request->tipoPassageiro;
            $passageiro->passageiroable_id = $pedido->id;
            $passageiro->passageiroable_type = "pacote";
            $passageiro->save();
             
            return redirect()->back();
            
    }
    //Adicionar contactos
    public function addContact(Request $request, $id){
        $this->validate($request, [
            'pincipemail' => 'required|email|max:100',
            'principtelefone' => 'required|string|max:15',
            'emergemail' => 'nullable|email|max:100',
            'emergtelefone' => 'nullable|string|max:15',
           ]);
           $pedido = PedidoPacote::findOrFail($id);
            $contacto = new Contacto;
            $contacto->emailprincipal = $request->pincipemail;
            $contacto->telefoneprincipal = $request->principtelefone;
            $contacto->emailemergencia = $request->emergemail;
            $contacto->telefoneemergencia = $request->emergtelefone;
            $contacto->contactable_id = $pedido->id;
            $contacto->contactable_type = "pacote";
            $contacto->save();

            return redirect()->back();
    }
    //funcoes do menu meus pedidos
    public function pendents(){
        $clientes = Cliente::where('users_id',  Auth::id())->get();
        $pedidos = PedidoPacote::where('clientes_id', $clientes[0]->id)
        ->where('estado', 1)->get();
        return view('pedidospacote.meuspedidos.pendentes', compact('pedidos'));
    }
    public function comfirmados(){
        $clientes = Cliente::where('users_id',  Auth::id())->get();
        $pedidos = PedidoPacote::where('clientes_id', $clientes[0]->id)
        ->where('estado', 2)->get();
        return view('pedidospacote.meuspedidos.confirmados', compact('pedidos'));
    }
    public function cancelados(){
        $clientes = Cliente::where('users_id',  Auth::id())->get();
        $pedidos = PedidoPacote::where('clientes_id', $clientes[0]->id)
        ->where('estado', 3)->get();
        return view('pedidospacote.meuspedidos.cancelados', compact('pedidos'));
    }
    public function cancelar($id){
        $pedido = PedidoPacote::findOrFail($id);
        $pedido->estado = 3;
        $pedido->save();         
        return redirect()->back();
        
    }
    public function showPedido($id){
        $pedido = PedidoPacote::findOrFail($id);
        $passageiros = $pedido->passageiros;
        $passagens = $pedido->passagens;
        $contacto = $pedido->contacto;
        return view('pedidosPacote.show', compact('pedido', 'passageiros', 'passagens','contacto'));
    }
    protected function validation($request){
        return $this->validate($request, [
        'nrviajantes' => 'required|numeric|max:99',
        'transporte' => 'nullable|string|max:55',
         'partida' => 'required|string|max:55',
         'destino' => 'required|string|max:55',
         'start' =>'required|date',
         'end' =>'required|date',
         'descricao' =>'required|string',         
        ]);
    }
}
