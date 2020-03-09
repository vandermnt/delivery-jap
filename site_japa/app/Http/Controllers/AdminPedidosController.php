<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Carrinho;
use DB;

class AdminPedidosController extends Controller{

  public function mostrarPedidos(){
    date_default_timezone_set('America/Sao_Paulo');

    $dataDehoje = date('Y/m/d');

    $carrinhos = Carrinho::all();

    
    $dados_pedidos = DB::table('carrinhos')
    ->join('users', 'carrinhos.id_usuario', '=', 'users.id')
    ->select('carrinhos.id', 'carrinhos.troco', 'carrinhos.op_entrega', 'users.telefone', 'users.name', 'users.complemento', 'users.bairro', 'users.num_casa', 'users.endereco', 'carrinhos.taxa_entrega', 'carrinhos.data_compra', 'carrinhos.forma_pagamento', 'carrinhos.valor', 'carrinhos.compra_aprovada', 'carrinhos.status_entrega')
    ->where('compra_finalizada', '=', true)
    ->where('data_compra', '>=', $dataDehoje)
    ->get();

    $itens_pedidos = DB::table('compras')
      ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
      ->join('carrinhos', 'compras.carrinho_id', '=', 'carrinhos.id')
      ->select('produtos.nome', 'compras.qtde_produto', 'compras.carrinho_id', 'produtos.sabor')
      ->where('carrinhos.compra_finalizada', '=', true)->get();

    return view ('pedidosAdm')->with('dados_pedidos', $dados_pedidos)->with('itens_pedidos', $itens_pedidos);
  }

  public function alterarStatusCarrinho($id, $codigo){
    $objCarrinho = Carrinho::find($id);

    if($codigo == 0){
      $objCarrinho->compra_aprovada = false;
    }else if($codigo == 1){
      $objCarrinho->compra_aprovada = true;
    }

    $objCarrinho->save();

    return redirect()->action('AdminPedidosController@mostrarPedidos')->withInput();
  }

  public function alterarStatusEntrega($id, $codigo){
    $objCarrinho = Carrinho::find($id);

    if($codigo == 0){
      $objCarrinho->status_entrega = false;
    }else if($codigo == 1){
      $objCarrinho->status_entrega = true;
    }

    $objCarrinho->save();

    return redirect()->action('AdminPedidosController@mostrarPedidos')->withInput();
  }
  
  public function historicoPedidos(){
    date_default_timezone_set('America/Sao_Paulo');

    // $dataDehoje = date('Y/m/d');

    $carrinhos = Carrinho::all();

    
    $dados_pedidos = DB::table('carrinhos')
    ->join('users', 'carrinhos.id_usuario', '=', 'users.id')
    ->select('carrinhos.id', 'carrinhos.troco', 'carrinhos.op_entrega', 'users.telefone', 'users.name', 'users.complemento', 'users.bairro', 'users.num_casa', 'users.endereco', 'carrinhos.taxa_entrega', 'carrinhos.data_compra', 'carrinhos.forma_pagamento', 'carrinhos.valor', 'carrinhos.compra_aprovada', 'carrinhos.status_entrega')
    ->where('compra_finalizada', '=', true)
    // ->where('data_compra', '>=', $dataDehoje)
    ->get();

    $itens_pedidos = DB::table('compras')
      ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
      ->join('carrinhos', 'compras.carrinho_id', '=', 'carrinhos.id')
      ->select('produtos.nome', 'compras.qtde_produto', 'compras.carrinho_id', 'produtos.sabor')
      ->where('carrinhos.compra_finalizada', '=', true)->get();
      

    return view ('historicoPedidos')->with('dados_pedidos', $dados_pedidos)->with('itens_pedidos', $itens_pedidos);
  }
  
  public function detalhesPedido($id){
    return redirect()->action('AdminPedidosController@mostrarPedidos')->withInput();
  }
}
