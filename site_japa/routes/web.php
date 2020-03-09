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

Auth::routes(); // SEM ELE APARECE QUE A ROTA LOGIN NÃO FOI ENCONTRADA
if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }

// ROTA QUE NÃO PRECISAM DE AUTENTICAÇÃO
Route::get('/', function () {
  return view('home');
});

Route::get('/cardapio', function () {
  return view('cardapio');
});


// ROTAS ADMINISTRADOR
Route::group(['middleware' => 'admin'], function (){

  Route::group(['middleware' => 'authAdm:admin'], function(){
    Route::get('/admin', 'AdminPedidosController@mostrarPedidos');
    Route::get('/relatclientes', 'AdminController@mostrarClientes');
    Route::get('/alterar-status/{id}/{codigo}', 'AdminPedidosController@alterarStatusCarrinho');
    Route::get('/alterar-status-pedido/{id}/{codigo}', 'AdminPedidosController@alterarStatusEntrega');
    Route::get('/historico_pedidos', 'AdminPedidosController@historicoPedidos');
    Route::get('/ver-pedido/{id}', 'AdminPedidosController@detalhesPedido');
  });

  //SERVE PRA RENOMEAR A ROTA
  Route::get('/admin/login', array('as' => 'loginAdm', 'uses' => 'AdminController@login'));
  Route::post('/admin/login', 'AdminController@postLogin');

  Route::get('/admin/logout', 'AdminController@logout');

});
//ROTAS CLIENTE
Route::group(['middleware' => 'auth'], function() {
  Route::get('/pedido', 'ClienteController@pedido');
  Route::get('/verpedido', 'CompraController@verPedido');
  Route::get('/minhaconta', 'ContaUsuarioController@contaUsuario');
  Route::get('/meus-dados', 'ContaUsuarioController@meusDados');
  Route::post('/meus-dados', 'ContaUsuarioController@salvarAlteracaoMeusDados');
  Route::get('/meus-pedidos', 'ContaUsuarioController@meusPedidos');
  Route::post('/statuspedido', 'CompraController@attPag');
  Route::post('/add-produto', 'CompraController@addProdutoCarrinho');
  Route::post('/add-produto/mobile', 'CompraController@addProdutoCarrinhoMob');
  Route::get('/excluir-compra/{id}', 'CompraController@excluirCompraMob');

  Route::get('/excluir-compraex/{id}', 'CompraController@excluirExclusivo');
  Route::get('/excluir-compran/{id}', 'CompraController@excluirNiguiri');
  Route::get('/excluir-comprat/{id}', 'CompraController@excluirTemaki');
  Route::get('/excluir-comprah/{id}', 'CompraController@excluirHossomaki');
  Route::get('/excluir-comprae/{id}', 'CompraController@excluirEntrada');
  Route::get('/excluir-comprau/{id}', 'CompraController@excluirUramaki');


  Route::get('/finalizar-compra', 'CompraController@finalizarCompra');
  Route::post('/sucess', 'CompraController@salvarPedido');
  
  Route::get('/pedido-pratosq', 'CompraController@comprarpQuentes');
  Route::get('/pedido-entradas', 'CompraController@comprarEntradas');
  Route::get('/pedido-porcao', 'CompraController@comprarPorcao');
  Route::get('/pedido-bebida', 'CompraController@comprarBebida');
  Route::get('/pedido-miniburguer', 'CompraController@comprarMiniBurguer');
  Route::get('/pedido-uramaki', 'CompraController@comprarUramaki');
  Route::get('/pedido-sashimi', 'CompraController@comprarSashimi');
  Route::get('/pedido-temaki', 'CompraController@comprarTemaki');
  Route::get('/pedido-hossomaki', 'CompraController@comprarHossomaki');
  Route::get('/pedido-exclusivo', 'CompraController@comprarExclusivo');
  Route::get('/pedido-niguiri', 'CompraController@comprarNiguiri');
  Route::get('/alterar-senha', 'ContaUsuarioController@updateSenha');
  Route::post('/alterar-senha', 'ContaUsuarioController@verifica');


});

Route::get('/logout', function() {
  Auth::logout();
  // Session::flush(); DESTROI A SESSÃO DESCONECTANDO TODOS USUARIOS
  return Redirect::to('/login');
});
