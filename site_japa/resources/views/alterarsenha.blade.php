@extends('principal')

@section('folderPrincipal')

@stop
@section('conteudo')

<div id="telaMobile" style="background-color:white">
  @if(isset($error))
  <div class="alert alert-danger">
    Senha atual incorreta! Tente novamente!
  </div>
  @endif
  <div class="container">
    <div class="col-sm-12" style="margin-top:-50px"  >
      <form role="form" method="post" action=" {{ action('ContaUsuarioController@verifica') }}">
      <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
      <div class="row">
        <div class="col-10">
          <input id="senha_nova" class="form-control" type="password" name="senha_nova" pattern=".{6,20}" placeholder="Digite sua nova senha" required><span> Mínimo 6 caracteres </span>
        </div>
        <div class="col-2">
          <a style="margin-left:-20px" onclick="mostrarSenhaNova()"><i class="fas fa-eye"></i></a>
        </div>
      </div>
    </div> <br>
    <div class="col-sm-4">
      <button type="submit" class="btn btn-primary btn-lg btn-block"> <b> ALTERAR SENHA </b>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function mostrarSenhaNova() {
  var tipo = document.getElementById("senha_nova");
  if(tipo.type == "password"){
    tipo.type = "text";
  }else{
    tipo.type = "password";
  }
}
</script>
@stop
