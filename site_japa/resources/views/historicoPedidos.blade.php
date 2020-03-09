@extends('principalAdm')
@section('folderPrincipal')
@stop
@section('conteudo')
<br>
<div id="caixaPedidosAMD">
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="text-align:center">Nº PEDIDO</th>
        <th scope="col" style="text-align:center">DATA E HORÁRIO</th>
        <th scope="col" style="text-align:center">CLIENTE</th>
        <th scope="col" style="text-align:center">VALOR TOTAL (PEDIDO + TAXA)</th>
        <th scope="col" style="text-align:center">OPÇÃO</th>
      </tr>
    </thead>
    <tbody>
      @foreach($dados_pedidos as $pedidos)
      <tr>
        <td style="text-align:center">{{ $pedidos->id}}</td>
        <?php $horas = date('H:i', strtotime($pedidos->data_compra)); ?>
        <?php $data = date('d/m', strtotime($pedidos->data_compra)); ?>
        <td style="text-align:center"> {{$data}} - {{$horas}} </td>
        <td style="text-align:center">{{ $pedidos->name}}</td>
        <?php $valor_formatado = number_format($pedidos->valor, 2, ',', '.'); ?>
        <td style="text-align:center">{{ $valor_formatado}}</td>
        <td style="text-align:center"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{$pedidos->id}}"> <i style="size:30px" class="fas fa-search-plus"></i> <b> VER DETALHES </b> </button> </td>
      </tr>
              <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$pedidos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="fonteMeuPedidoMob" style="color: black" class="modal-title" id="exampleModalLabel">Detalhes Pedido nº {{ $pedidos->id}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php $valor_tx = number_format($pedidos->taxa_entrega, 2, ',', '.'); ?>
          <div style="font-family: 'Roboto', sans-serif;font-size:25px;" class="modal-body">
            <p><img src="{{ url("/img/data.ico") }}"> Data - Horário: {{$data}} - {{$horas}} </p>
            <p><img src="{{ url("/img/cliente.ico") }}"> Cliente: {{$pedidos->name}}</p>
            <p><img src="{{ url("/img/money.png") }}">Valor: {{$valor_formatado}}</p>
            <p><img src="{{ url("/img/f_pagamento.ico") }}"> Forma de Pagamento: {{$pedidos->forma_pagamento}}</p>
            <p><img src="{{ url("/img/entrega.ico") }}"> Opção de Entrega: {{$pedidos->op_entrega}}</p>
            <p><img src="{{ url("/img/tx_entrega.ico") }}"> Taxa de Entrega: {{$valor_tx}}</p>
            <p><img src="{{ url("/img/lista.ico") }}"> Itens: <br>@foreach($itens_pedidos as $it)
          @if($it->carrinho_id == $pedidos->id)
          Qtd:{{ $it->qtde_produto}} - {{$it->nome}}({{$it->sabor}}) <br>
          @endif
          @endforeach</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
      @endforeach
    </tbody>
  </table>
</div>
<br><br>
@stop
