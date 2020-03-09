@extends('principalAdm')
@section('folderPrincipal')
@stop
@section('conteudo')
<script>

function timer(){

window.location.reload();

}

setTimeout("timer()",4000);

</script>
<br>
<div id="caixaPedidosAMD">
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">NºPEDIDO</th>
        <th scope="col">OPÇÃO ENTREGA</th>
        <th scope="col">DATA - HORÁRIO</th>
        <th scope="col" style="text-align:center">TELEFONE CLIENTE</th>
        <th scope="col" style="text-align:center">ENDEREÇO</th>
        <th scope="col" style="text-align:center" >STATUS PEDIDO</th>
        <th scope="col" style="text-align:center" >STATUS ENTREGA</th>
        <th scope="col" style="text-align:center">R$</th>
        <th scope="col" style="text-align:center">FORMA DE PAGAMENTO</th>
        <th scope="col" style="text-align:center">TROCO PARA</th>
        <th scope="col" style="text-align:center">ITENS</th>
      </tr>
    </thead>
    <tbody>
      @foreach($dados_pedidos as $d_pedidos)
      <tr>
        <th scope="row" style="text-align:center">{{ $d_pedidos->id}}</th>
        <th scope="row" style="text-align:center">{{ $d_pedidos->op_entrega}}</th>
        <?php $horas = date('H:i', strtotime($d_pedidos->data_compra)); ?>
        <?php $data = date('d/m', strtotime($d_pedidos->data_compra)); ?>
        <th scope="row" style="text-align:center">{{$data}} {{$horas}}</th>
        <td style="text-align:center">{{ $d_pedidos->telefone}} - {{$d_pedidos->name}}</td>
        <td>{{ $d_pedidos->endereco}} - {{ $d_pedidos->bairro}} - nº{{ $d_pedidos->num_casa}} - Complemento: {{ $d_pedidos->complemento}}</td>
        <td>
          <div class="dropdown">
            <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @if($d_pedidos->compra_aprovada == 0)
              <img src="{{ url('/img/cancelar.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: red"> NÃO APROVADO </b>
              @elseif($d_pedidos->compra_aprovada == 1)
              <img src="{{ url('/img/atendido.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: green">  APROVADO </b>
              @endif
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ action('AdminPedidosController@alterarStatusCarrinho', ['id' => $d_pedidos->id, 'codigo' => 0])}}" style="color: red"> <img src="" style="width: 12px; height: 12px; margin-top: -3px"> <b> NÃO APROVADO </b></a>
              <a class="dropdown-item" href="{{ action('AdminPedidosController@alterarStatusCarrinho', ['id' => $d_pedidos->id, 'codigo' => 1])}}" style="color: green"> <img src="" style="width: 12px; height: 12px; margin-top: -3px"> <b> APROVADO </b></a>
            </div>
          </div>
        </td>
        <td>
          <div class="dropdown">
            @if($d_pedidos->compra_aprovada == 1)
              <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                @if($d_pedidos->op_entrega == 'Entrega domicilio')
                    @if($d_pedidos->status_entrega == 0)
                    <img src="{{ url('/img/cancelar.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: red"> ESPERANDO </b>
                    @elseif($d_pedidos->status_entrega == 1)
                    <img src="{{ url('/img/atendido.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: green">  SAIU PARA ENTREGA </b>
                    @endif
                @else
                    @if($d_pedidos->status_entrega == 0)
                    <img src="{{ url('/img/cancelar.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: red"> ESPERANDO </b>
                    @elseif($d_pedidos->status_entrega == 1)
                    <img src="{{ url('/img/atendido.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: green"> PRONTO PARA RETIRADA </b>
                    @endif
                @endif    
              </button>
            @elseif($d_pedidos->compra_aprovada == 0)
              <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                @if($d_pedidos->op_entrega == 'Entrega domicilio')
                    @if($d_pedidos->status_entrega == 0)
                    <img src="{{ url('/img/cancelar.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: red"> ESPERANDO </b>
                    @elseif($d_pedidos->status_entrega == 1)
                    <img src="{{ url('/img/atendido.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: green">  SAIU PARA ENTREGA </b>
                    @endif
                @else
                    @if($d_pedidos->status_entrega == 0)
                    <img src="{{ url('/img/cancelar.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: red"> ESPERANDO </b>
                    @elseif($d_pedidos->status_entrega == 1)
                    <img src="{{ url('/img/atendido.png') }}" style="width: 12px; height: 12px; margin-top: -3px;"> <b style="color: green">  PRONTO PARA RETIRADA </b>
                    @endif
                @endif
              </button>
            @endif
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ action('AdminPedidosController@alterarStatusEntrega', ['id' => $d_pedidos->id, 'codigo' => 0])}}" style="color: red"> <img src="" style="width: 12px; height: 12px; margin-top: -3px"> <b> ESPERANDO </b></a>
              @if($d_pedidos->op_entrega == 'Entrega domicilio')
                <a class="dropdown-item" href="{{ action('AdminPedidosController@alterarStatusEntrega', ['id' => $d_pedidos->id, 'codigo' => 1])}}" style="color: green"> <img src="" style="width: 12px; height: 12px; margin-top: -3px"> <b> SAIU PARA ENTREGA </b></a>
              @else
                  <a class="dropdown-item" href="{{ action('AdminPedidosController@alterarStatusEntrega', ['id' => $d_pedidos->id, 'codigo' => 1])}}" style="color: green"> <img src="" style="width: 12px; height: 12px; margin-top: -3px"> <b> PRONTO PARA RETIRADA </b></a>
              @endif
            </div>
          </div>
        </td>

        <?php $valor_formatado = number_format($d_pedidos->valor, 2, ',', '.'); ?>
        <?php $valor_tx = number_format($d_pedidos->taxa_entrega, 2, ',', '.'); ?>
        <td style="text-align:center">{{ $valor_formatado}} - Taxa Entrega: {{ $valor_tx }}</td>
        <td style="text-align:center">{{ $d_pedidos->forma_pagamento}}</td>
        <td style="text-align:center">
          <?php $valor_formatado = number_format($d_pedidos->troco, 2, ',', '.'); ?>
          {{ $valor_formatado}}
        </td>
        <td style="width: 23%; text-align: center">  @foreach($itens_pedidos as $it)
          @if($it->carrinho_id == $d_pedidos->id)
          {{$it->nome}}({{$it->sabor}}) - Quantidade: {{ $it->qtde_produto}} <br>
          @endif
          @endforeach
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br><br>

@stop
