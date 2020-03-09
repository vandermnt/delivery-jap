@extends('layouts.appTeste')

@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
<div class="container">
  <div id="caixaLogin">

    <div class="row">
      <div class="col-sm-7">
        <p id="tamanhoP"> Ainda não é cadastrado? Cadastre-se </p>
        <hr>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" placeholder="Nome Completo" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>
            <div class="col-md-6">
              <input type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <input type="password" placeholder="Senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
              @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="col-md-6">
              <input type="password" placeholder="Confirme sua senha" class="form-control" name="password_confirmation" required>
            </div>
          </div>

          <p style="color:black"> Endereço </p>
          <div class="form-group row">
            <div class="col-md-6">
              <input placeholder="CEP" class="form-control" name="cep" required>
            </div>
            <div class="col-md-6">
              <input placeholder="Endereço" class="form-control" name="endereco" required>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-4">
              <input placeholder="Bairro" class="form-control" name="bairro" required>
            </div>
            <div class="col-md-3">
              <input placeholder="Nº da casa" class="form-control" name="num_casa" required>
            </div>
            <div class="col-md-5">
              <input placeholder="Telefone" class="form-control" name="telefone" required>
            </div>

          </div>

          <div class="form-group row mb-0">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success btn-lg btn-block">
                Cadastrar
                <i class="fa fa-check-circle" aria-hidden="true"></i>

              </button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-sm-5">
        <div class="card bg-light mb-3" style="max-width: 100%;">
          <div class="card-header" style="background-color: #01A9DB; color: white"> <b> Já Sou Cadastrado! Fazer login </b></div>
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group row">
                <div class="col-md-3" align="right">
                </div>
                <div class="col-md-8" align="right">
                  <input id="email" type="email" placeholder="Digite seu e-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3" align="right">
                </div>
                <div class="col-md-8">
                  <input id="password" type="password"  placeholder="Digite sua senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div align="center">
                <div class="col-sm-12">
                  @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                  </a>
                  @endif
                </div>
                <div class="col-sm-12">
                  <button type="submit" align="center" class="btn btn-success">
                    <b> {{ __('LOGIN') }} </b>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@stop
