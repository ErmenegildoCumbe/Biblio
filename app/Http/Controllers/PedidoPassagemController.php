<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PedidoPassagem;
use App\User;
use App\Cliente;
use Auth;

class PedidoPassagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = PedidoPassagem::where('estado', 1)->get();
        return view('passagens.requisicoes', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passagens.create');  
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
        $pedido = new PedidoPassagem;
        $pedido->nr_passageiros = $request->viajantes;
        $pedido->ponto_partida = $request->ppartida;
        $pedido->ponto_chegada = $request->destino;        
        $pedido->data_partida = date_create($request->start);
        if(isset($request->end) && ($request->tipoReserva == 2)){
            $pedido->data_retorno = date_create($request->end);
        }        
        $pedido->descricao = $request->descricao;
        $pedido->tipo_reserva = $request->tipoReserva;
        $pedido->estado = 1;        
        $cliente = User::findOrFail(Auth::id())->cliente;
        $pedido->clientes_id = $cliente->id;
        $pedido->save();
        return redirect()->route('pedidoPassagem.edit', ['id' => $pedido->id]);
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
        $pedido = PedidoPassagem::findOrFail($id);
        $passageiros = $pedido->passageiros;
        $passagens = $pedido->passagens;
        $contacto = $pedido->contacto;
        return view('passagens.edit', compact('pedido', 'passageiros', 'passagens','contacto'));
        
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
    //pedidos cancelados, confirmados...
    public function comfirmados(){       
        $requisicoes = PedidoPassagem::where('estado', 2)->get();
        return view('passagens.requisicoesconfirmadas', compact('requisicoes'));
    }
    public function cancelados(){        
        $requisicoes = PedidoPassagem::where('estado', 3)->get();
        return view('passagens.requisicoescanceladas', compact('requisicoes'));
    }
    public function cancelar($id){
        $pedido = PedidoPassagem::findOrFail($id);
        $pedido->estado = 3;
        $pedido->save();         
        return redirect()->back();
        
    }
    public function showPedido($id){
        $pedido = PedidoPassagem::findOrFail($id);
        $passageiros = $pedido->passageiros;
        $passagens = $pedido->passagens;
        $contacto = $pedido->contacto;
        return view('passagens.show', compact('pedido', 'passageiros', 'passagens','contacto'));
        
    }
    //pedidos de passagem do proprio user
    public function pendents(){
        $clientes = Cliente::where('users_id',  Auth::id())->get();
        $pedidos = PedidoPassagem::where('clientes_id', $clientes[0]->id)
        ->where('estado', 1)->get();
        return view('passagens.meuspedidos.pendentes', compact('pedidos'));
    }
    public function meusComfirmados(){
        $clientes = Cliente::where('users_id',  Auth::id())->get();
        $pedidos = PedidoPassagem::where('clientes_id', $clientes[0]->id)
        ->where('estado', 2)->get();
        return view('passagens.meuspedidos.confirmados', compact('pedidos'));
    }
    public function meusCancelados(){
        $clientes = Cliente::where('users_id',  Auth::id())->get();
        $pedidos = PedidoPassagem::where('clientes_id', $clientes[0]->id)
        ->where('estado', 3)->get();
        return view('passagens.meuspedidos.cancelados', compact('pedidos'));
    }
    public function showOwenPedido($id){
        $pedido = PedidoPassagem::findOrFail($id);
        $passageiros = $pedido->passageiros;
        $passagens = $pedido->passagens;
        $contacto = $pedido->contacto;
        return view('passagens.meuspedidos.cancelado', compact('pedido', 'passageiros', 'passagens','contacto'));
        
    }
    //Default validation
    protected function validation($request){
        return $this->validate($request, [
        'viajantes' => 'required|numeric|max:9',
        'tipoReserva' => 'required|numeric|max:2',
         'ppartida' => 'required|string|max:55',
         'destino' => 'required|string|max:55',
         'start' =>'required|date',
         'end' =>'nullable|date',
         'descricao' =>'required|string',         
        ]);
    }
}
