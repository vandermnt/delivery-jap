@extends('principal')

@section('folderPrincipal')

@stop
@section('conteudo')

<div id="telaGrande">
  @if (isset($erro))
  <div class="alert alert-danger">
    Erro
  </div>

  @elseif(isset($sucess))
  <div class="alert alert-success">
    Item excluido com sucesso!
  </div>
  @endif
  <div id="cont">
    <div class="row">
      <div class="col-sm-9">
        <div class="row">
          @foreach ($niguiri as $e)
          <form role="form" method="post" action=" {{ action('CompraController@addProdutoCarrinho') }}">
            <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
            <input type ="hidden" name="id_produto" value="{{ $e->id }}">
            <input type ="hidden" name="id_usuario" value="{{ Auth()->user()->id }}">
                        <div class="col-sm-3">

            <div class="card-deck" style="width: 21rem; height: 27rem; margin-bottom: 10px">
  <div class="card">
                <img class="card-img-top" src="{{ url("/img/$e->img_produto") }}" alt="Card image cap">
    <div class="card-body">
      
                  <p style="font-size: 20px" class="card-title">{{ $e->sabor }} </p>
                  <?php $valor_formatado = number_format($e->preco, 2, ',', '.'); ?>
                  <p style="font-size:17px" class="card-text">Unidade:  <b style="color: green"> R$ {{ $valor_formatado }} </b></p>
                  <!--<p id="fonteIngre" style="margin-top:-10px; font-size:18px" class="card-text">Ingredientes: {{ $e->ingredientes }}</p>-->
    </div>
    <div class="card-footer">
<select id="options" name="qtd" class="form-control" required>
                    <option value="" disabled="true" selected="true"> - Selecione a quantidade -  </option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                  </select>
                  <button type="submit" class="btn btn-danger" style="margin-top:7px; width: 100%; background-color: red"> <b> Adicionar no carrinho </b> <i style="font-size: 18px" class="fas fa-cart-plus"></i></button>    </div>
  </div>
  
</div>

           
            </div>
          </form>
          @endforeach
        </div>
      </div>

      <div class="col-sm-3">
          <a href="/pedido" type="button" class="btn btn-success" style="margin-top:7px; width: 100%"> <b> Voltar ao menu <i class="fas fa-bars"></i> </b> </a> <p></p>
        <div class="card">
          <h5 id="fonteMeuPedido" class="card-header" style="background:red; font-size: 2vw"><i class="fa fa-file-text-o" aria-hidden="true"></i>
            Meu Pedido</h5>
            <div class="card-body">
              @foreach($compras_em_aberto as $c)
              <?php $preco = $c->qtde_produto * $c->preco ?>
              <div  class="row" style="font-family: 'Signika', sans-serif; font-size:1.2vw;">
                <div class="col-sm-8">
                  <p> {{$c->nome}} - {{$c->sabor}} </p>
                </div>
                <div class="col-sm-4">
                  <p style="float:right"> Qtde: {{ $c->qtde_produto }} </p>
                </div>
              </div>
              <div class="row" style="font-family: 'Signika', sans-serif; font-size:1.2vw;">
                <div class="col-sm-4">
                  <a href="{{ action('CompraController@excluirNiguiri', ['id' => $c->id])}}"> <i style="margin-left:15px; font-size:35px; color: black" class="fa fa-trash-o" aria-hidden="true"></i> </a>
                </div>
                <div class="col-8">
                  <?php $valor_formatado = number_format($preco, 2, ',', '.'); ?>
                  <p style="float:right;"> Valor: R${{ $valor_formatado }} </p>
                </div>
              </div>
              <hr>
              @endforeach
              <div id="myDIV" style="font-family: 'Signika', sans-serif; font-size:18px;">
              </div>
              <div  class="row" style="font-family: 'Signika', sans-serif; font-size:23px;">
                <div class="col-sm-12">
                  <div class="alert alert-primary" role="alert" align="center" style="font-size: 1.3vw">
                    <?php $valor_formatado = number_format($total_pedido, 2, ',', '.'); ?>
                    Pedido: Valor Total: {{$valor_formatado}}
                  </div>
                                    <?php date_default_timezone_set('America/Sao_Paulo');
    $hora_atual = date('H:i:s');
    $inicio = '18:27:00';
    $fim = '23:40:00'; ?>


    @if($total_pedido>0 && $hora_atual < $fim && $hora_atual >= $inicio)
        <a href="{{ action('CompraController@finalizarCompra')}}" style="margin-top:2px; width: 100%" class="btn btn-success"> <b> FINALIZAR PEDIDO <i class="fa fa-check" aria-hidden="true"> </i> </b> </a>
    @elseif($total_pedido>0 &&  $hora_atual <= $inicio)
        <div class="alert alert-danger" style="text-align: center; font-size: 1vw" role="alert">
            <b> DELIVERY ONLINE FECHADO! ABERTO A PARTIR DAS 18:30hrs <b>
        </div>
    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="telaMobile">
    <br>
    @foreach($niguiri as $e)
    <form role="form" method="post" action=" {{ action('CompraController@addProdutoCarrinhoMob') }}">
      <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
      <input type ="hidden" name="id_produto" value="{{ $e->id }}">
      <input type ="hidden" name="id_usuario" value="{{ Auth()->user()->id }}">
      <div class="col-sm-3">
        <div class="card" style="width: 100%;margin-bottom:15px">
          <img class="card-img-top" style="height: 240px" src="{{ url("/img/$e->img_produto") }}" alt="Card image cap">
          <div class="card-body">
            <p style="font-size: 30px" class="card-title">{{ $e->sabor }} </p>
            <?php $valor_formatado = number_format($e->preco, 2, ',', '.'); ?>
            <p style="margin-top:-15px; font-size:22px" class="card-text">Unidade: <b style="color: green"> R$ {{ $valor_formatado }} </b></p>
            <select id="options" name="qtd" class="form-control" required>
              <option value="" disabled="true" selected="true"> - Selecione a quantidade -  </option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
            </select>
            <button type="submit" class="btn btn-success" style="margin-top:7px; width: 100%"> <b> Adicionar no carrinho </b> <i style="font-size: 18px" class="fas fa-cart-plus"></i></button>
          </div>
        </div>
      </div>
    </form>
    @endforeach
    <div class="col-sm-12">
      <a href="/pedido" type="button" class="btn btn-success" style="margin-top:7px; width: 100%"> <b> Voltar ao menu <i class="fas fa-bars"></i> </b> </a>
    </div><br>
  </div>
  @stop
