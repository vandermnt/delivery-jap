<?php

namespace App\Http\Controllers;

use Request;
use App\Produto;
use App\Compra;
use App\Carrinho;
use App\Http\Controllers\Auth;
use DB;

class ClienteController extends Controller{

  //FUNÇÃO PRA QUANDO A PESSOA JÁ ESTÁ LOGADA NO SISTEMA
  public function pedido(){
    $id = auth()->user()->id;
    $id_user = $id;
    $produto = Produto::all();

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_user)->first();

    if(isset($id_carinhoAberto) && $id_carinhoAberto->count() > 0){
      $compras_em_aberto = Compra::where('carrinho_id', '=', $id_carinhoAberto->id)->get();

      //FUNÇÃO PARA SOMAR TUDO QUANDO TIVER CARRINHO EM ABERTO
      $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_user)->first()->id;

      $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

      $total_pedido = 0;
      //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
      foreach($id_produtos_no_carrinho as $id_p){
        $preco = Produto::find($id_p->produto_id)->preco;

        $qtde_vezes_preco = $id_p->qtde_produto * $preco;

        $total_pedido = $total_pedido + $qtde_vezes_preco;

        // echo $id_p->qtde_produto," * ",  $preco, '=', $qtde_vezes_preco; echo "<br>";
        // echo "TOTAL: ",  $total_pedido; echo "<br>";
      }
     
              
     $compras_em_aberto = DB::table('compras')
        ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
        ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
        ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

      return view('fazerPedido')->with('total_pedido', $total_pedido)->with('produto', $produto)->with('compras_em_aberto', $compras_em_aberto);
      
    }else{
      $dataDehoje = date('Y/m/d');

      $objCarrinhoModel = new Carrinho();
      $objCarrinhoModel->id_usuario = $id_user;
      $objCarrinhoModel->data_compra = $dataDehoje;
      $objCarrinhoModel->compra_finalizada = false;
      $objCarrinhoModel->compra_aprovada = false;
      $objCarrinhoModel->status_entrega = false;

      $objCarrinhoModel->save();
    }

    return view('fazerPedido')->with('total_pedido', $total_pedido)->with('produto', $produto)->with('compras_em_aberto', $compras_em_aberto);
  }
}



