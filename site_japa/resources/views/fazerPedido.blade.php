@extends('principal')


@section('folderPrincipal')
@if (isset($erro))
<div class="alert alert-danger">
  Erro
</div>

@elseif(isset($sucess))
<div class="alert alert-success">
  <i style="font-family: 'Rubik', sans-serif; font-size:20px"> <i class="fas fa-check"></i> Item adicionado ao carrinho. Continue comprando!  </i>
</div>
@endif
<div id="telaGrande">
  <section id="pageintro" class="hoc clear">
    <div>
      <!-- <h4 id="japDelv" style="font-size:55px; text-shadow: 4px 6px black; margin-top:-85px"><b>JAP RESTAURANT DELIVERY</b></h4> -->
      <u> <p style="color: white; font-family: 'Rubik', sans-serif; font-size:32px; text-shadow: 3px 3px black;">O que eu vou pedir hoje no JAP DELIVERY?</p> </u>
      <footer>
    <div class="row">
        <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-6">
            <a href="{{ url('/pedido-entradas')}}"><button id="ll" style="width: 92%; height: 70px; margin-top:-15px; margin-left:9%;" type="button" class="btn btn-outline-light"><b id="diminuiLetra"> <img src="{{ url("/img/rice.png") }}">  Entradas  </b></button></a>
          </div>
          <div class="col-sm-6">
            <a href="{{ url('/pedido-uramaki')}}"><button id="ll" style="width: 92%; height: 70px; margin-top:-15px; margin-right:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:85px; height:52px" src="{{ url("/img/uramaki.png") }}"> Uramaki</b></button></a>
          </div>
        </div> <br>
        <div class="row">
          <div class="col-sm-6">
            <a href="{{ url('/pedido-temaki')}}"><button id="ll" style="width: 92%; height: 70px; margin-left:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:60px; height:55px"src="{{ url("/img/temaki.png") }}"> Temaki</b></button></a>
          </div>
          <div class="col-sm-6">
            <a href="{{ url('/pedido-hossomaki')}}"><button id="ll" style="width: 92%; height: 70px; margin-right:9%" type="button" class="btn btn-outline-light"> <b id="diminuiLetra"><img style="width:40px; height:43px"src="{{ url("/img/sushi.png") }}"> Hossomaki</b></button></a>
          </div>
        </div> <br>
        <div class="row">
          <div class="col-sm-6">
            <a href="{{ url('/pedido-niguiri')}}"><button id="ll" style="width: 92%; height: 70px; margin-left:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:45px; height:45px"src="{{ url("/img/nigui.png") }}"> Niguiri</b></button></a>
          </div>
          <div class="col-sm-6">
            <a href="{{ url('/pedido-exclusivo')}}"><button id="ll" style="width: 92%; height: 70px; margin-right:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:60px; height:60px"src="{{ url("/img/exclu.png") }}"> Exclusivos</b></button></a>
          </div>
        </div> <br>
        <div class="row">
          <div class="col-sm-6">
            <a href="{{ url('/pedido-sashimi')}}"> <button id="ll" style="width: 92%; height: 70px; margin-left:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:50px; height:50px"src="{{ url("/img/sashimi.png") }}"> Sashimi</b></button></a>
          </div>
          <div class="col-sm-6">
            <a href="{{ url('/pedido-porcao')}}"><button id="ll" style="width: 92%; height: 70px; margin-right:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:60px; height:65px"src="{{ url("/img/porc.png") }}"> Porções</b></button></a>
          </div>
        </div> <br>
        <div class="row">
          <div class="col-sm-6">
            <a href="{{ url('/pedido-pratosq')}}"> <button id="ll" style="width: 92%; height: 70px; margin-left:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:50px; height:50px"src="{{ url("/img/soup.png") }}"> Pratos Quentes</b></button></a>
          </div>
          <div class="col-sm-6">
             <a href="#"><button id="ll" style="width: 92%; height: 70px; margin-right:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:50px; height:50px"src="{{ url("/img/buguer.png") }}"> Mini Burgues</b></button></a>
          </div>
        </div> <br>
        <div class="row">
          <div class="col-sm-6">
            <button id="ll" style="width: 92%; height: 70px; margin-left:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:60px; height:55px"src="{{ url("/img/promote.png") }}">Promoções</b></button>
          </div>
          <div class="col-sm-6">
             <a href="{{ url('/pedido-bebida')}}"><button id="ll" style="width: 92%; height: 70px; margin-right:9%" type="button" class="btn btn-outline-light"><b id="diminuiLetra"><img style="width:50px; height:50px"src="{{ url("/img/bebida.png") }}"> Bebidas</b></button></a>
          </div>
        </div>
        </div>
        <div class="col-sm-2">
        <div class="card scroll" style="width: 130%;  margin-top:-15px;">
          <h5 id="fonteMeuPedido" class="card-header" style="background:red; font-size: 1.4vw"><i class="fa fa-file-text-o" aria-hidden="true"></i>
            Meu Pedido</h5>
            <div class="card-body" style="color: black">
              @foreach($compras_em_aberto as $c)
              <?php $preco = $c->qtde_produto * $c->preco ?>
              <div  class="row" style="font-family: 'Signika', sans-serif">
                <div class="col-sm-12">
                  <p style="float: left; font-size:1vw;"> {{$c->nome}} - {{$c->sabor}} </p>
                </div>
              </div>
              <div class="row">
                  <div class="col-sm-12">
                  <p style="float:left; font-size:1.2vw;"> Quantidade: {{ $c->qtde_produto }} </p>
              </div>
              </div>
              <div class="row" style="font-family: 'Signika', sans-serif; font-size:1vw;">
                <div class="col-sm-10">
                  <!--<a href="{{ action('CompraController@excluirTemaki', ['id' => $c->id])}}"> <i style="margin-left:15px; font-size:1vw; color: black" class="fa fa-trash-o" aria-hidden="true"></i> </a>-->
                  <?php $valor_formatado = number_format($preco, 2, ',', '.'); ?>
                  <p style="float:left; font-size:1.2vw;"> <b>Valor: R$</b> <b style="color: green">{{ $valor_formatado }}</b> </p>
                </div>
                <div class="col-2">
                  <!--<?php $valor_formatado = number_format($preco, 2, ',', '.'); ?>-->
                  <!--<p style="float:right; font-size:1vw;"> Valor: R${{ $valor_formatado }} </p>-->
                </div>
              </div>
              <hr>
              @endforeach
              <div id="myDIV" style="font-family: 'Signika', sans-serif;">
              </div>
              <div  class="row" style="font-family: 'Signika', sans-serif;">
                <div class="col-sm-12">
                  <div class="alert alert-primary" role="alert" align="center" style="font-size: 1vw">
                    <?php $valor_formatado = number_format($total_pedido, 2, ',', '.'); ?>
                    Pedido: Valor Total: {{$valor_formatado}}
                  </div>
                                    <?php date_default_timezone_set('America/Sao_Paulo');
    $hora_atual = date('H:i:s');
    $inicio = '18:30:00';
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
      </footer>
    </div>
  </section>
</div>

<div id="telaMobile">
  <div style="text-align:center">
    <a href="{{ url('/pedido-entradas')}}"> <button style="background-image:url('/img/en.jpeg'); width: 100%; height: 123px"> <p style="color: white; text-shadow: 3px 4px black; font-size:60px; font-family: 'Acme', sans-serif;"> <b> Entradas </b> </p> </button></a>
    <a href="{{ url('/pedido-hossomaki')}}"> <button style="background-image:url('/img/hoo.jpeg'); width: 100%; height: 123px"> <p style="color: white;  text-shadow: 3px 4px black; font-size:60px; font-family: 'Acme', sans-serif;"> <b> Hossomaki </b> </p> <p style="margin-top:-40px; color: white; text-shadow: 1px 1px black"> <b> Sushi com alga externa </b> </p> </button></a>
    <a href="{{ url('/pedido-uramaki')}}"> <button style="background-image:url('/img/ura.jpeg'); width: 100%; height: 123px"> <p style="color: white;  text-shadow: 3px 4px black;font-size:60px; font-family: 'Acme', sans-serif;"> <b> Uramaki </b> </p> <p style="margin-top:-40px; color: white; text-shadow: 1px 1px black"> <b> Sushi com alga interna </b> </p> </button></a>
    <a href="{{ url('/pedido-temaki')}}"> <button style="background-image:url('/img/tem.jpeg'); width: 100%; height: 123px"> <p style="color: white;  text-shadow: 3px 4px black; font-size:60px; font-family: 'Acme', sans-serif;"> <b> Temaki </b> </p> <p style="margin-top:-40px; color: white; text-shadow: 2px 2px black"> <b> Cone com alga recheada </b> </p> </button></a>
    <a href="{{ url('/pedido-niguiri')}}"> <button style="background-image:url('/img/ni.jpeg'); width: 100%; height: 123px"> <p style="color: white; text-shadow: 3px 4px black; font-size:60px; font-family: 'Acme', sans-serif;"> <b> Niguiri </b> </p> <p style="margin-top:-37px; color: white; text-shadow: 1px 2px black"> <b> Bolinho de arroz com fatia de peixe em cima </b> </p> </button></a>
    <a href="{{ url('/pedido-sashimi')}}"> <button style="background-image:url('/img/img_sashimi.jpg'); width: 100%; height: 123px"> <p style="color: white; text-shadow: 3px 4px black; font-size:60px; font-family: 'Acme', sans-serif;"> <b> Sashimi </b> </p> <p style="margin-top:-12px; color: white; text-shadow: 1px 2px black"> <b>  </b> </p> </button></a>
    <a href="{{ url('/pedido-porcao')}}"> <button style="background-image:url('/img/por.jpg'); width: 100%; height: 123px"> <p style="color: white; text-shadow: 3px 4px black; font-size:65px; font-family: 'Acme', sans-serif;"> <b> Porções </b> </p>  </button></a>
    <a href="#"> <button style="background-image:url('/img/hamb.jpg'); width: 100%; height: 123px"> <p style="color: white; text-shadow: 3px 4px black; font-size:50px; font-family: 'Acme', sans-serif;"> <b> Mini Burguers </b> </p> <p></p> </button></a>
    <a href="{{ url('/pedido-pratosq') }}"> <button style="background-image:url('/img/pratosquentes.jpg'); width: 100%; height: 123px"> <p style="color: white; text-shadow: 3px 4px black; font-size:50px; font-family: 'Acme', sans-serif;"> <b> Pratos Quentes  </b>  </button></a>
    <a href="{{ url('/pedido-exclusivo')}}"> <button style="background-image:url('/img/exx.jpeg'); width: 100%; height: 123px"> <p style="color: white; text-shadow: 3px 4px black; font-size:60px; font-family: 'Acme', sans-serif;"> <b> Exclusivos </b> </p> </button></a>
    <a href="#"> <button style="background-image:url('/img/sale.jpeg'); width: 100%; height: 123px"> <p style="color: white; text-shadow: 3px 4px black; font-size:57px; font-family: 'Acme', sans-serif;"> <b> Promoções </b> </p> <p style="margin-top:-42px; font-size:30px; color: white; text-shadow: 1px 2px black"> <b> Em breve </b> </p> </button></a>
    <a href="{{ url('/pedido-bebida')}}"> <button style="background-image:url('/img/bebida.jpg'); width: 100%; height: 123px"> <p style="color: white; text-shadow: 3px 5px black; font-size:60px; font-family: 'Acme', sans-serif;"> <b> Bebidas </b> </p> </button></a>
  </div>
</div>
@stop
