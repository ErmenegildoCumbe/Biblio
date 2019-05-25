<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('livro.index');
})->middleware('auth')->name('home');

Route::get('/home', function () {
    return redirect()->route('livro.index');
})->middleware('auth');

Route::get('pacote/requisitar', function () {
    return view('pacotes.requisitar');
});
//Retornando pagina de erro
Route::fallback(function () {
    return view('404');
});
//Rotas Livros
Route::resource('livro', 'LivroController')->middleware('auth');
Route::get('/livro/desactivar/{id}', 'LivroController@desactivar')->middleware('auth');
Route::get('/livros/indisponiveis', 'LivroController@indisponiveis')->middleware('auth');

//Rotas Emprestimos
Route::resource('emprestimo', 'EmprestimoController')->middleware('auth');
Route::get('/emprestimo/livro/{id}', 'EmprestimoController@paginaEmprestar')->middleware('auth');
Route::get('/emprestimo/devolucao/{id}', 'EmprestimoController@devolver')->middleware('auth');
Route::get('/emprestimos/sucedidos', 'EmprestimoController@sucedidos')->middleware('auth');
Route::get('/emprestimo/cancelar/{id}', 'EmprestimoController@cancelar')->middleware('auth');
Route::get('/emprestimos/cancelados', 'EmprestimoController@cancelados')->middleware('auth');

// Rotas Reservas
Route::resource('reserva', 'ReservaController')->middleware('auth');
Route::get('reservar/{id}', 'ReservaController@criar')->middleware('auth');
Route::get('reserva/confirmar/{id}', 'ReservaController@confirmar')->middleware('auth');
Route::get('reserva/cancelar/{id}', 'ReservaController@cancelar')->middleware('auth');



//Rotas pacote de viagem
Route::resource('pacote', 'PacoteController');
Route::get('pacote/{id}/editimage', 'PacoteController@showaddimages')->name('pacoteimages');
Route::post('pacote/addimages', 'PacoteController@addimages')->name('addimage');
//pedido pacote de viagem
Route::resource('pedidoPacote', 'PedidoPacoteController');
Route::post('pedidoPacote/{id}', 'PedidoPacoteController@viaPacote')->name('addPedidoViaPacote');
Route::post('pedidoPacote/addpassenger/{id}', 'PedidoPacoteController@addPassenger')->name('addPassenger');
Route::post('pedidoPacote/addcontacts/{id}', 'PedidoPacoteController@addContact')->name('addContact');
Route::get('meuspedidos/pacotes/pendentes', 'PedidoPacoteController@pendents')->name('pedidospendentes'); 
Route::get('meuspedidos/pacotes/confirmados', 'PedidoPacoteController@comfirmados')->name('pedidosconfirmados'); 
Route::get('meuspedidos/pacotes/cancelados', 'PedidoPacoteController@cancelados')->name('pedidoscancelados'); 
Route::get('meuspedidos/pacotes/cancelar/{id}', 'PedidoPacoteController@cancelar')->name('cancelarPedido'); 
Route::get('meuspedidos/pacotes/confirmados/{id}', 'PedidoPacoteController@showPedido')->name('showpedido'); 
//rotas de passagens
Route::resource('pedidoPassagem', 'PedidoPassagemController'); 
Route::get('pedidoPassagem/requisicoes/canceladas', 'PedidoPassagemController@cancelados')->name('pedidospassagemCancelados'); 
Route::get('pedidoPassagem/requisicoes/confirmadas', 'PedidoPassagemController@comfirmados')->name('pedidospassagemconfirmados');
Route::get('pedidoPassagem/requisicoes/cancelar/{id}', 'PedidoPassagemController@cancelar')->name('cancelarRequisicao');
Route::get('pedidoPassagem/{id}/detalhes', 'PedidoPassagemController@showPedido')->name('showrequisicao'); 
Route::get('pedidoPassagem/meus/confirmados', 'PedidoPassagemController@meusComfirmados')->name('meusconfirmados');
Route::get('pedidoPassagem/meus/pendentes', 'PedidoPassagemController@pendents')->name('meuspendentes');
Route::get('pedidoPassagem/meus/cancelados', 'PedidoPassagemController@meusCancelados')->name('meuscancelados'); 
Route::get('pedidoPassagem/meus/{id}/cancelado', 'PedidoPassagemController@showOwenPedido')->name('showcanceled');

//rotas de users
Route::resource('operadores', 'OperadorsController')->middleware('admin');
Route::post('operadores/add', 'OperadorsController@storeajax')->name('addopera')->middleware('admin');
Route::get('operadores/editstate/{id}', 'OperadorsController@editstatus')->name('updatestate')->middleware('admin');
Route::resource('administradores', 'AdministradorController')->middleware('admin');
Route::get('administradores/editstate/{id}', 'AdministradorController@editstatus')->name('updatestateadmin')->middleware('admin');
Route::resource('clientes', 'ClienteController');
Route::get('utilizadores/create', function () {
    return view('utilizadores.create');
})->name('userscreate')->middleware('admin'); 

Route::get('utilizadores/activos', function () {
    return view('utilizadores.users');
})->name('usersactivos'); 

Route::get('utilizadores/desactivados', function () {
    return view('utilizadores.disabled');
})->name('usersdesactivados'); 

Route::get('utilizadores/clientes', function () {
    return view('utilizadores.clients');
})->name('usersclientes'); 

//  Demo rotas de atuth
Route::get('register', function () {
    return view('authentication.register');
})->name('criarconta'); 
Route::get('login', function () {
    return view('authentication.login');
})->name('login'); 

Route::post('register', 'CustomAuthController@register')->name('register');
Route::get('/logar', 'CustomAuthController@login')->name('logar');
Route::post('logout', 'CustomAuthController@logout')->name('logout');

//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//OAuthRoutes...
Route::get('login/{service}', 'CustomAuthController@redirectToProvider');
Route::get('login/{service}/callback', 'CustomAuthController@handleProviderCallback');
