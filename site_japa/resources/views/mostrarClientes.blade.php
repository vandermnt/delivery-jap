@extends('principalAdm')
@section('folderPrincipal')
@stop
@section('conteudo')
<br>
<div id="caixaPedidosAMD">
     <div class="alert alert-primary" style="text-align: center" role="alert">
    <b>  CLIENTES CADASTRADOS: {{ $total_clientes }} </b>
    </div>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="text-align:center">Nº ID</th>
        <th scope="col" style="text-align:center">NOME</th>
        <th scope="col" style="text-align:center">E-MAIL</th>
        <th scope="col" style="text-align:center">CEP</th>
        <th scope="col" style="text-align:center" >TELEFONE</th>
      </tr>
    </thead>
    <tbody>
      @foreach($clientes as $c)
      <tr>
        <td style="text-align:center">{{ $c->id}}</td>
        <td style="text-align:center">{{ $c->name}}</td>
        <td style="text-align:center">{{ $c->email}}</td>
        <td style="text-align:center">{{ $c->cep}}</td>
        <td style="text-align:center">{{ $c->telefone}} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br><br>

<br>
@stop
