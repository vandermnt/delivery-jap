@extends('principal')

@section('folderPrincipal')

@stop
@section('conteudo')

<div id="telaMobile" style="background-color:white">
  <div class="container">
    <div class="col-sm-8" style="margin-top:-50px"  >
      <form role="form" method="post" action=" {{ action('ContaUsuarioController@salvarAlteracaoMeusDados') }}">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">

        <div class="col-sm-4">
          <p id="fonte" style="text-align:left; color:black; font-size:25px"> MEUS DADOS </p>
        </div>
        <div class="col-sm-4">
          <input class="form-control" name="nome" value="{{ $dados_user->name }}">
        </div>  <br>
        <div class="col-sm-8">
          <input class="form-control" name="email" value="{{ $dados_user->email }}">
        </div> <br>
        <div class="col-sm-4">
          <input class="form-control" name="cep" value="{{ $dados_user->cep }}">
        </div> <br>
        <div class="col-sm-4">
          <input class="form-control" name="endereco" value="{{ $dados_user->endereco }}">
        </div> <br>
        <div class="col-sm-4">
          <input class="form-control" name="bairro" value="{{ $dados_user->bairro }}">
        </div> <br>
        <div class="col-sm-4">
          <input class="form-control" name="num_casa" value="{{ $dados_user->num_casa }}">
        </div> <br>
        <div class="col-sm-4">
          <input class="form-control" name="telefone" value="{{ $dados_user->telefone }}">
        </div> <br>
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary btn-lg btn-block"> <b> SALVAR ALTERAÇÕES </b>
          </div>
        </form>
      </div>
    </div>
  </div>
  @stop
