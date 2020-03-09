<?php

use Illuminate\Http\Request;
use App\User;
use App\Carrinho;
use App\Compra;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/statuspedido/{id_user}/{id_car}', function ($id_user, $id_car) {
  $id = $id_user;
  $id_carrinho = $id_car;

  $carrinho = Carrinho::find($id_carrinho);

  return response()->json(['sucess'=>$carrinho], "200");
  // return json_encode(array('Dados_carrinho' => $carrinho));

});

Route::get('/attpedidos', function () {
   $carrinhos = Carrinho::all();

    $dados_pedidos = Carrinhos::join('users', 'carrinhos.id_usuario', '=', 'users.id')
    ->select('carrinhos.id', 'carrinhos.troco', 'users.telefone', 'users.bairro', 'carrinhos.data_compra', 'users.num_casa', 'users.endereco', 'carrinhos.forma_pagamento', 'carrinhos.valor', 'carrinhos.compra_aprovada', 'carrinhos.status_entrega')
    ->where('compra_finalizada', '=', true)->get();

    $itens_pedidos = Compras::join('produtos', 'compras.produto_id', '=', 'produtos.id')
      ->join('carrinhos', 'compras.carrinho_id', '=', 'carrinhos.id')
      ->select('produtos.nome', 'compras.qtde_produto', 'compras.carrinho_id', 'produtos.sabor')
      ->where('carrinhos.compra_finalizada', '=', true)->get();

    return view ('pedidosAdm')->with('dados_pedidos', $dados_pedidos)->with('itens_pedidos', $itens_pedidos);
});


// echo json_encode( array('Dados Carrinho' => $carrinho));
