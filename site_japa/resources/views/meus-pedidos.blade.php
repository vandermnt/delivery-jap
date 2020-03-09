@extends('principal')

@section('folderPrincipal')

@stop
@section('conteudo')
<div id="telaGrande">
  <div class="container">
    <div id="caixaFinalizarPedidos" style="margin-top:-50px">
      <div class="row">
        <div class="col-sm-6">
          <a href="{{ url('/minhaconta')}}" title="" class="btn btn-primary btn-facebook" style="line-height: 60px;text-align: center; width:100%; font-size: 35px">
            <i class="fas fa-user"></i> Dados Pessoais
          </a>
        </div>
        <div class="col-sm-6">
          <a href="{{ url('/meus-pedidos')}}" title="" class="btn btn-primary btn-facebook" style="line-height: 60px;text-align: center; width:100%; font-size: 35px">
            <i class="fas fa-clipboard-list"></i> Meus Pedidos
          </a>
        </div>
      </div><hr>
      <p id="fonte" style="text-align:left; color:#B40404; font-size:25px"> Histórico de Pedidos </p>

      <div class="row" style="margin-top:">
        @foreach($meus_pedidox as $meus_pedidos)
        <?php $data = date('d/m/Y', strtotime($meus_pedidos->updated_at)); ?>
        <?php $valor_formatado = number_format($meus_pedidos->valor, 2, ',', '.'); ?>

        <div class="col-sm-12">
          <div id="caixaMeusPedidosMobile">
            <p id="fonteMeusPedidos" style="margin-left:7px; font-size: 20px; color: black;">  Data do Pedido: {{ $data }} | PEDIDO Nº {{$meus_pedidos->id}} | R$ {{$valor_formatado}}</p>
            @if($meus_pedidos->compra_finalizada==false)
            <p id="fonteStatusPedidos" style="margin-left:7px;  font-size: 19px; margin-top:-10px">  STATUS: Em andamento </p> <hr>
            @else
            <p id="fonteStatusPedidos" style="margin-left:7px;  font-size: 19px; margin-top:-10px">  Forma de Pagamento: {{$meus_pedidos->forma_pagamento}} </p>
            <p id="fonteStatusPedidos" style="margin-left:7px;  font-size: 19px; margin-top:-10px">  STATUS: Finalizado </p> <hr>
            @endif
          </div>
        </br>
      </div>
      @endforeach
    </div>
    <div class="row">
    <div class="col-sm-12">
      <a href="{{ url('/')}}" class="btn btn-success btn-lg btn-block"> <b> VOLTAR AO MENU INICIAL</b> </a>
      </div></div>
  </div>
</div><br>
</div>

<div id="telaMobile" style="background-color:#E6E6E6">
  <div class="container">
    <div class="col-sm-8" style="margin-top:-50px"  >
      <div class="col-sm-4">
        <p id="fonte" style="text-align:left; color:black; font-size:25px"> MEUS PEDIDOS </p>
      </div>
      @foreach($meus_pedidox as $p)
      <?php $data = date('d/m/Y', strtotime($p->updated_at)); ?>
      <?php $valor_formatado = number_format($p->valor, 2, ',', '.'); ?>

      <div class="col-sm-4">
        <div id="caixaMeusPedidosMobile">
          <p id="fonteMeusPedidos" style="margin-left:25px; color: black;">  {{ $data }} | PEDIDO Nº {{$p->id}} | R$ {{$valor_formatado}}</p>
             @if($p->compra_aprovada==false && $p->compra_finalizada == true)
          <p id="fonteStatusPedidos" style="margin-left:25px;  margin-top:-10px">  STATUS: Aguardando Aprovação </p> <hr>
          @elseif($p->compra_aprovada == true && $p->status_entrega == false)
          <p id="fonteStatusPedidos" style="margin-left:25px;  margin-top:-10px">  STATUS: Pedido Aprovado - Aguardando ficar pronto  </p> <hr>
          @elseif($p->compra_aprovada == true && $p->status_entrega == true)
            <p id="fonteStatusPedidos" style="margin-left:25px;  margin-top:-10px">  STATUS: Pedido Aprovado - Saiu para entrega  </p> <hr>
            
          @else
            <p id="fonteStatusPedidos" style="margin-left:25px;  margin-top:-10px">  STATUS: Em aberto (Comprando)  </p> <hr>
            
            
            @endif
            <div class="d-flex justify-content-center">
            <button style="width: 100%;margin-top: -25px;" class="btn btn-primary"> VISUALIZAR PEDIDO </button>
          </div>
        </div>
      </br>
    </div>
    @endforeach
  </div>
</div>
</div>
@stop
