<?php
namespace App\Http\Controllers;

use Request;
use App\Carrinho;
use App\Compra;
use App\Produto;
use App\User;
use DB;

class CompraController extends Controller{

  public function addProdutoCarrinho(){

    $id_produto = Request::input('id_produto');
    $qtd_produto = Request::input('qtd');
    $id_usuario = Request::input('id_usuario');

    $carrinho_em_aberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first();

    if(isset($carrinho_em_aberto) && $carrinho_em_aberto->count() > 0){
      //CASO JÁ TENHA UM CARRINHO EM ABERTO EU SO ADD AS COMPRAS
      $objCompraModel = new Compra();
      $objCompraModel->carrinho_id = $carrinho_em_aberto->id;
      $objCompraModel->produto_id = $id_produto;
      $objCompraModel->qtde_produto = $qtd_produto;

      $objCompraModel->save();

    }else{

      //DATA DA COMPRA
      $dataDehoje = date('Y/m/d');

      //CRIA UM CARRINHO CASO NÃO TENHA UM EM ABERTO
      $objCarrinhoModel = new Carrinho();
      $objCarrinhoModel->id_usuario = $id_usuario;
      $objCarrinhoModel->data_compra = $dataDehoje;
      $objCarrinhoModel->compra_finalizada = false;
      $objCarrinhoModel->compra_aprovada = false;
      $objCarrinhoModel->status_entrega = false;
      $objCarrinhoModel->save();

      //SALVA OS PRODUTOS
      $objCompraModel = new Compra();
      $objCompraModel->carrinho_id = $carrinho_em_aberto->id;
      $objCompraModel->produto_id = $id_produto;
      $objCompraModel->qtde_produto = $qtd_produto;

      $objCompraModel->save();

    }

    $produto = Produto::all();

    //DEPOIS DE TER ADD OU CRIADO UM NOVO CARRINHO, FAZ DE NOVO A BUSCA PRA ENVIAR PRA A VIEW FAZER PEDIDO

    //CHAMA PRA PEGAR ID DO CARRINHO
    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

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

    //BUSCA COMPRAS COM O ID DO CARRINHO

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    $sucess = 'sucess';

    return view('fazerPedido')->with('sucess', $sucess)->with('total_pedido', $total_pedido)->with('produto', $produto)->with('compras_em_aberto', $compras_em_aberto);

  }

  public function addProdutoCarrinhoMob(){

    $id_produto = Request::input('id_produto');
    $qtd_produto = Request::input('qtd');
    $id_usuario = Request::input('id_usuario');

    $carrinho_em_aberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first();

    if(isset($carrinho_em_aberto) && $carrinho_em_aberto->count() > 0){
      //CASO JÁ TENHA UM CARRINHO EM ABERTO EU SO ADD AS COMPRAS
      $objCompraModel = new Compra();
      $objCompraModel->carrinho_id = $carrinho_em_aberto->id;
      $objCompraModel->produto_id = $id_produto;
      $objCompraModel->qtde_produto = $qtd_produto;

      $objCompraModel->save();

    }else{

      //DATA DA COMPRA
      $dataDehoje = date('Y/m/d');

      //CRIA UM CARRINHO CASO NÃO TENHA UM EM ABERTO
      $objCarrinhoModel = new Carrinho();
      $objCarrinhoModel->id_usuario = $id_usuario;
      $objCarrinhoModel->data_compra = $dataDehoje;
      $objCarrinhoModel->compra_finalizada = false;
      $objCarrinhoModel->compra_aprovada = false;

      $objCarrinhoModel->save();

      //SALVA OS PRODUTOS
      $objCompraModel = new Compra();
      $objCompraModel->carrinho_id = $carrinho_em_aberto->id;
      $objCompraModel->produto_id = $id_produto;
      $objCompraModel->qtde_produto = $qtd_produto;

      $objCompraModel->save();

    }

    $produto = Produto::all();

    //DEPOIS DE TER ADD OU CRIADO UM NOVO CARRINHO, FAZ DE NOVO A BUSCA PRA ENVIAR PRA A VIEW FAZER PEDIDO

    //CHAMA PRA PEGAR ID DO CARRINHO
    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;

    }

    //BUSCA COMPRAS COM O ID DO CARRINHO
    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    $sucess = 'sucess';

    return view('verPedidoMobile')->with('sucess', $sucess)->with('total_pedido', $total_pedido)->with('produto', $produto)->with('compras_em_aberto', $compras_em_aberto);

  }

  public function verPedido(){
    $id = auth()->user()->id;
    $id_usuario = $id;
    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;

    }

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('verPedidoMobile')->with('total_pedido', $total_pedido)->with('produto', $produto)->with('compras_em_aberto', $compras_em_aberto);
  }


  public function finalizarCompra(){
    $id = auth()->user()->id;
    $id_user = $id;

    $endereco = User::find($id_user)->endereco;
    $bairro = User::find($id_user)->bairro;
    $num_casa = User::find($id_user)->num_casa;
    $cep = User::find($id_user)->cep;
    $complemento = User::find($id_user)->complemento;


    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_user)->first()->id;


    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();
    $total_pedido = 0;
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;
      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('produtos.nome', 'compras.qtde_produto', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view ("finalizarCompra")->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido)->with('endereco', $endereco)->with('num_casa', $num_casa)->with('cep', $cep)->with('bairro', $bairro)->with('complemento', $complemento);
  }

  public function comprarUramaki(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $uramakis = Produto::where('nome', '=', 'Uramaki')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-uramaki')->with('uramakis', $uramakis)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }
  
  public function comprarSashimi(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $sashimi = Produto::where('nome', '=', 'Sashimi')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-sashimi')->with('sashimi', $sashimi)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }

 public function comprarEntradas(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $entradas = Produto::where('nome', '=', 'Entrada')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-entrada')->with('entradas', $entradas)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }

    public function comprarPorcao(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $porcao = Produto::where('nome', '=', 'Porção')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-porcao')->with('porcao', $porcao)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }


    public function comprarpQuentes(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $pQuentes = Produto::where('nome', '=', 'Pratos Quentes')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-pratosq')->with('pQuentes', $pQuentes)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }

  public function excluirCompraMob($id){
    $compra = Compra::find($id);
    $compra->delete();
    return redirect()->action('CompraController@verPedido')->withInput();
  }

  public function excluirEntrada($id){
    $compra = Compra::find($id);
    $compra->delete();
    return redirect()->action('CompraController@comprarEntradas')->withInput();
  }

  public function excluirHossomaki($id){
    $compra = Compra::find($id);
    $compra->delete();
    return redirect()->action('CompraController@comprarHossomaki')->withInput();
  }

  public function excluirUramaki($id){
    $compra = Compra::find($id);
    $compra->delete();
    return redirect()->action('CompraController@comprarUramaki')->withInput();
  }

  public function excluirTemaki($id){
    $compra = Compra::find($id);
    $compra->delete();
    return redirect()->action('CompraController@comprarTemaki')->withInput();
  }

  public function excluirNiguiri($id){
    $compra = Compra::find($id);
    $compra->delete();
    return redirect()->action('CompraController@comprarNiguiri')->withInput();
  }

  public function excluirExclusivo($id){
    $compra = Compra::find($id);
    $compra->delete();
    return redirect()->action('CompraController@comprarExclusivo')->withInput();
  }

  public function comprarTemaki(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $temaki = Produto::where('nome', '=', 'Temaki')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-temaki')->with('temaki', $temaki)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }

  public function comprarBebida(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $bebida = Produto::where('nome', '=', 'Bebida')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-bebida')->with('bebida', $bebida)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }
  
  public function comprarMiniBurguer(){
    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $mini_burguer = Produto::where('nome', '=', 'Mini Burguer')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-miniburguer')->with('mini_burguer', $mini_burguer)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);  
  }

  public function comprarHossomaki(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $hossomaki = Produto::where('nome', '=', 'Hossomaki')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-hossomaki')->with('hossomaki', $hossomaki)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }


  public function comprarExclusivo(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $exclusivo = Produto::where('nome', '=', 'Exclusivos')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-exclusivo')->with('exclusivo', $exclusivo)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }

  public function comprarNiguiri(){

    $id_usuario = auth()->user()->id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_usuario)->first()->id;

    $id_produtos_no_carrinho = Compra::where('carrinho_id', '=', $id_carinhoAberto)->select('produto_id', 'qtde_produto')->get();

    $total_pedido = 0;
    //SOMAR TODOS OS VALORES, PRA CALCULAR O VALOR FINAL DO Carrinho
    foreach($id_produtos_no_carrinho as $id_p){
      $preco = Produto::find($id_p->produto_id)->preco;

      $qtde_vezes_preco = $id_p->qtde_produto * $preco;

      $total_pedido = $total_pedido + $qtde_vezes_preco;
    }

    $niguiri = Produto::where('nome', '=', 'Niguiri')->get();

    $compras_em_aberto = DB::table('compras')
    ->join('produtos', 'compras.produto_id', '=', 'produtos.id')
    ->select('compras.id', 'produtos.nome', 'compras.qtde_produto', 'produtos.preco', 'produtos.sabor')
    ->where('compras.carrinho_id', '=', $id_carinhoAberto)->get();

    return view('pedido-niguiri')->with('niguiri', $niguiri)->with('compras_em_aberto', $compras_em_aberto)->with('total_pedido', $total_pedido);
  }

  public function salvarPedido(){
    date_default_timezone_set('America/Sao_Paulo');

    $id = auth()->user()->id;
    $id_user = $id;

    $id_carinhoAberto = Carrinho::where('compra_finalizada', '=', false)->where('id_usuario', '=', $id_user)->first()->id;

    if($id_carinhoAberto==null){
      $id_ultima_compra = Carrinho::where('id_usuario', '=', $id_user)->max('id');
      $objCarrinho = Carrinho::find($id_ultima_compra);

      return view('pedido-sucess')->with('objCarrinho', $objCarrinho);
    }

    $opcao_entrega = Request::input('op_entrega');

    $cep = Request::input('cep');
    $endereco = Request::input('endereco');
    $taxa_entrega = Request::input('tx_entrega');
    $taxa_entrega = doubleval($taxa_entrega);

    $arr = explode(" - ", Request::input('bairro'));
    $bairro = $arr[0];

    $num_casa = Request::input('num_casa');

    $forma_pagamento = Request::input('forma_pagamento');

    $total_pedido = Request::input('total_pedido');

    $obs = Request::input('observacao');

    if($forma_pagamento == 'dinheiro'){

    $data_compra = date('Y-m-d H:i:s');

      $troco_para = Request::input('dinheiro');

      $objCarrinho = Carrinho::find($id_carinhoAberto);

      $objCarrinho->compra_finalizada = true;
      $objCarrinho->valor = $total_pedido;
      $objCarrinho->forma_pagamento = $forma_pagamento;
      $objCarrinho->troco = $troco_para;
      $objCarrinho->data_compra = $data_compra;
      $objCarrinho->op_entrega = $opcao_entrega;
      $objCarrinho->taxa_entrega = $taxa_entrega;
      $objCarrinho->save();

      $objUser = User::find($id_user);
      $objUser->endereco = $endereco;
      if($bairro == ""){
        $objUser->num_casa = $num_casa;
        $objUser->save();
        return view('pedido-sucess')->with('objCarrinho', $objCarrinho);    
      }else{
      $objUser->bairro = $bairro;
      $objUser->num_casa = $num_casa;
      $objUser->save();

      return view('pedido-sucess')->with('objCarrinho', $objCarrinho);}

    }else if($forma_pagamento == 'c_credito'){
        $data_compra = date('Y-m-d H:i:s');

      $bandeira_credito = Request::input('bandeira_credito');

      $objCarrinho = Carrinho::find($id_carinhoAberto);

      $objCarrinho->compra_finalizada = true;
      $objCarrinho->valor = $total_pedido;
      $objCarrinho->forma_pagamento = $forma_pagamento;
      $objCarrinho->bandeira_cartao = $bandeira_credito;
      $objCarrinho->data_compra = $data_compra;
      $objCarrinho->op_entrega = $opcao_entrega;
      $objCarrinho->taxa_entrega = $taxa_entrega;
      $objCarrinho->save();

      $objUser = User::find($id_user);
      $objUser->endereco = $endereco;
      $objUser->bairro = $bairro;
      $objUser->num_casa = $num_casa;
      $objUser->save();

      return view('pedido-sucess')->with('objCarrinho', $objCarrinho);

    }else if($forma_pagamento == 'c_debito'){
    $data_compra = date('Y-m-d H:i:s');

      $bandeira_debito = Request::input('bandeira_debito');

      $objCarrinho = Carrinho::find($id_carinhoAberto);

      $objCarrinho->compra_finalizada = true;
      $objCarrinho->valor = $total_pedido;
      $objCarrinho->forma_pagamento = $forma_pagamento;
      $objCarrinho->bandeira_cartao = $bandeira_debito;
      $objCarrinho->data_compra = $data_compra;
      $objCarrinho->op_entrega = $opcao_entrega;
      $objCarrinho->taxa_entrega = $taxa_entrega;
      $objCarrinho->save();

      $objUser = User::find($id_user);
      $objUser->endereco = $endereco;
      $objUser->bairro = $bairro;
      $objUser->num_casa = $num_casa;
      $objUser->save();

      return view('pedido-sucess')->with('objCarrinho', $objCarrinho);
    }
  }
}
