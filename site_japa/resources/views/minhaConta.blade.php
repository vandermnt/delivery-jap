@extends('principal')

@section('folderPrincipal')

@stop
@section('conteudo')
@if(isset($sucess))
 <script>window.onload = function () { alert("Dados alterados com sucesso!"); }
 </script>
@endif
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
      <form role="form" method="post" action=" {{ action('ContaUsuarioController@salvarAlteracaoMeusDados') }}">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">

        <p id="fonte" style="text-align:left; color:#B40404; font-size:25px"> Dados Pessoais </p>
        <div class="row">
          <div class="col-sm-6">
            <span style="font-size: 15px; color: green; text-align:left"> <b>Nome Completo:</b> </span>
            <input class="form-control" style="height:50px; font-size:20px" name="nome" value="{{ $dados_user->name }}">
          </div>
          <div class="col-sm-6">
            <span style="font-size: 15px; color: green"> <b>E-mail:</b> </span>
            <input class="form-control" style="height:50px; font-size:20px" name="email" value="{{ $dados_user->email }}">
          </div> </div><br>
          <div class="row">
            <div class="col-sm-4">
              <span style="font-size: 15px; color: green"> <b>CEP:</b> </span>
              <input class="form-control" style="height:50px; font-size:20px" name="cep" value="{{ $dados_user->cep }}">
            </div>
            <div class="col-sm-8">
              <span style="font-size: 15px; color: green"> <b>Endereço:</b> </span>
              <input class="form-control" style="height:50px; font-size:20px" name="endereco" value="{{ $dados_user->endereco }}">
            </div> </div><br>
            <div class="row">
            <div class="col-sm-4">
              <span style="font-size: 15px; color: green"> <b>Bairro:</b> </span>
              <input class="form-control" style="height:50px; font-size:20px" name="bairro" value="{{ $dados_user->bairro }}">
            </div>
            <div class="col-sm-4">
              <span style="font-size: 15px; color: green"> <b>Nº Casa:</b> </span>
              <input class="form-control" style="height:50px; font-size:20px" name="num_casa" value="{{ $dados_user->num_casa }}">
            </div> <br>
            <div class="col-sm-4">
              <span style="font-size: 15px; color: green"> <b>Telefone:</b> </span>
              <input class="form-control" style="height:50px; font-size:20px" name="telefone" value="{{ $dados_user->telefone }}">
            </div> </div><br>
            <div class="row">
            <div class="col-sm-12">
              <span style="font-size: 15px; color: green"> <b>Nº Apto, Complemento, Referência:</b> </span>
              <input class="form-control" style="height:50px; font-size:20px" name="comple" value="{{ $dados_user->complemento }}">
            </div></div><br>
            <div class="row">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success btn-lg btn-block"> <b> SALVAR ALTERAÇÕES </b>
              </div></div>
            </form>
          </div>
        </div><br>
      </div>

      <div id="telaMobile" style="background-color:white">
        @if(isset($sucess))
        <div class="alert alert-success">
          Senha alterada com sucesso!
        </div>
        @endif
        <div class="container">
          <div style="margin-top:-60px;">
            <i style="font-size:20px; margin-left:18px; color:#424242" class="fas fa-shopping-cart"></i> <a href="/meus-pedidos" style="margin-left:10px"> Meus Pedidos <i style="float:right; margin-right:7px; font-size:30px" class="fas fa-angle-right"></i></a><hr>
            <!-- <a href="" style="margin-left:20px"> <i style="font-size:20px" class="fas fa-home"></i> Endereços <i style="float:right; margin-right:7px; font-size:30px" class="fas fa-angle-right"></i></a><hr> -->
            <i style="font-size:20px; margin-left:21px; color:#424242" class="fas fa-unlock-alt"></i> <a href="/alterar-senha" style="margin-left:13px"> Alterar Senha <i style="float:right; margin-right:7px; font-size:30px" class="fas fa-angle-right"></i></a><hr>
            <i style="font-size:20px; margin-left:21px; color:#424242" class="fas fa-user-circle"></i> <a href="/meus-dados" style="margin-left:10px"> Dados Gerais <i style="float:right; margin-right:7px; font-size:30px" class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>
      @stop
