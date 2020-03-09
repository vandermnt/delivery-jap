@extends('principal')

@section('folderPrincipal')

@stop
@section('conteudo')
<br>
<div id="caixaPedidos">
  <h4 id="fonteMeuPedidoMob" style="margin-left:15px; margin-top: 15px"> MEU PEDIDO <i class="fa fa-list-alt" aria-hidden="true"></i></h4>
  <hr>
  @foreach($compras_em_aberto as $c)
  <?php $preco = $c->qtde_produto * $c->preco ?>
  <div  class="row" style="font-family: 'Signika', sans-serif; font-size:18px;">
    <div class="col-7">
      <p style="margin-left:10px"> {{ $c->nome }} - {{ $c->sabor }}</p>
    </div>
    <div class="col-4">
      <p style="float:right"> Qtde: {{ $c->qtde_produto }} </p>
    </div>
    <div class="col-4">
      <a href="{{ action('CompraController@excluirCompraMob', ['id' => $c->id])}}"> <i style="margin-left:15px; font-size:35px; color: black" class="fa fa-trash-o" aria-hidden="true"></i> </a>
    </div>
    <div class="col-7">
      <?php $valor_formatado = number_format($preco, 2, ',', '.'); ?>
      <p style="float:right"> Valor: R${{ $valor_formatado }} </p>
    </div>
  </div>
  <hr>
  @endforeach
  <div class="alert alert-secondary" style="text-align: center" role="alert">
    <?php $valor_formatado = number_format($total_pedido, 2, ',', '.'); ?>
    <b> VALOR TOTAL DO PEDIDO: R$ {{ $valor_formatado}} <b>
    </div>
    
    
     <?php date_default_timezone_set('America/Sao_Paulo');
    $hora_atual = date('H:i:s');
    $inicio = '18:30:00';
    $fim = '23:40:00'; ?>


    @if($total_pedido>0 && $hora_atual < $fim && $hora_atual >= $inicio)
        <a href="{{ action('CompraController@finalizarCompra')}}" style="margin-top:2px; width: 100%" class="btn btn-success"> <b> FINALIZAR PEDIDO <i class="fa fa-check" aria-hidden="true"> </i> </b> </a>
        
    @elseif($total_pedido>0 &&  $hora_atual <= $inicio)
        <div class="alert alert-danger" style="text-align: center" role="alert">
            <b> DELIVERY ONLINE FECHADO! <br> ABERTO A PARTIR DAS 18:30hrs, de SEGUNDA à SÁBADO<b>
        </div>
    @endif
    <br><br>
    <a href="{{ url('/pedido')}}"><p id="fonte"><i class="fas fa-arrow-circle-left"></i> <b style="font-weight: 500;"
>CONTINUAR COMPRANDO</b>  </p> </a><br>
    <p id="fonte" style="text-align:center; color:black; font-weight: 300;"> <i class="fas fa-motorcycle" style="font-size:20px;"></i> <b>30 M - Tempo estimado para entrega. </b></p>

    @if($hora_atual < $fim && $hora_atual >= $inicio)
      <p id="fonte" style="text-align:center; color:green; font-weight: 600;"> <i class="fas fa-tv" style="font-size:20px;"></i> Delivery online - ABERTO </p>
    @else
      <p id="fonte" style="text-align:center; color:red; font-weight: 600;"> <i class="fas fa-tv" style="font-size:20px;"></i> </b>Delivery online - FECHADO </p>
     @endif 

  </div>
  @stop
