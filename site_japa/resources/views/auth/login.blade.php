@extends('layouts.appTeste')

@section('content')
<div id="telaGrande">
  <div class="container">
    <div id="caixaLogin">
      <div class="row">
        <div class="col-sm-7">
          <p id="tamanhoP" style="color: red"> Ainda não é cadastrado? Cadastre-se </p>
          <hr>
          <form method="POST" class="needs-validated" novalidate action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
              <div class="col-md-6">
                <input type="text" placeholder="Nome Completo" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong> Nome inválido </strong>
                </span>
                @endif
              </div>
              <div class="col-md-6">
                <input type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong> E-mail inválido </strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <input type="password" placeholder="Senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong> Senha inválida! Insira no minímo 6 digítos</strong>
                </span>
                @endif
              </div>
              <div class="col-md-6">
                <input type="password" placeholder="Confirme sua senha" class="form-control" name="password_confirmation" required>
              </div>
            </div>
            <hr>
            <p style="color:black"> Endereço </p>
            <div class="form-group row">
              <div class="col-md-6">
                <input placeholder="CEP" class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}" name="cep" required>
                @if ($errors->has('cep'))
                <span class="invalid-feedback" role="alert">
                  <strong> CEP inválido. Insira um CEP válido</strong>
                </span>
                @endif
              </div>
              <div class="col-md-6">
                <input placeholder="Endereço" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}" name="endereco" required>
                @if ($errors->has('endereco'))
                <span class="invalid-feedback" role="alert">
                  <strong> Endereço inválido. Insira um endereço válido</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-4">
                
                     <select name="bairro" class="form-control" required>
                  <option disabled="true" selected="true">Bairro</option>
                  <option value="29 de Julho">29 de Julho</option>
                  <option value="Beira Rio">Beira Rio</option>
                  <option value="Centro">Centro</option>
                  <option value="Costeira">Costeira</option>
                  <option value="Estradinha">Estradinha</option>
                  <option value="Jardim America">Jardim América</option>
                  <option value="Jardim Esperança">Jardim Esperança</option>
                  <option value="Jardim Iguaçu">Jardim Iguaçu</option>
                  <option value="Jardim Paraná">Jardim Paraná</option>
                  <option value="Jardim Santa Rosa">Jardim Santa Rosa</option>
                  <option value="Labra">Labra</option>
                  <option value="Oceania">Oceania</option>
                  <option value="Parque Agári">Parque Agári</option>
                  <option value="Porto dos Padres">Porto dos Padres</option>
                  <option value="Rocio">Rocio</option>
                  <option value="Vila Divineia">Vila Divinéia</option>
                  <option value="Vila Garcia">Vila Garcia</option>
                  <option value="Vila Horizonte">Vila Horizonte</option>
                  <option value="Vila Parangua">Vila Paranguá</option>
                  <option value="Vila Rute">Vila Rute</option>
                  <option value="Vila Sao Carlos">Vila São Carlos</option>
                  <option value="Alto Sao Sebtastião">Alto São Sebtastião</option>
                  <option value="Bockman">Bockman</option>
                  <option value="Centro Histórico">Centro Histórico</option>
                  <option value="Ilha dos Valadares">Ilha dos Valadares</option>
                  <option value="Jardim Araça">Jardim Araça</option>
                  <option value="Jardim Figueira">Jardim Figueira</option>
                  <option value="Jardim Jacaranda">Jardim Jacaranda</option>
                  <option value="Jardim Paranaguá">Jardim Paranaguá</option>
                  <option value="Jardim Santos Dumont">Jardim Santos Dumont</option>
                  <option value="Leblon">Leblon</option>
                  <option value="Padre Jackson">Padre Jackson</option>
                  <option value="Parque São João">Parque São João</option>
                  <option value="Porto Seguro">Porto Seguro</option>
                  <option value="Serraria do Rocha">Serraria do Rocha</option>
                  <option value="Vila Alboit">Vila Alboit</option>
                  <option value="Vila do Povo">Vila do Povo</option>
                  <option value="Vila Guadalupe">Vila Guadalupe</option>
                  <option value="Vila Itiberê">Vila Itiberê</option>
                  <option value="Vila Portuária">Vila Portuária</option>
                  <option value="Vila Santa Helena">Vila Santa Helena</option>
                  <option value="Vila Sao Jorge">Vila São Jorge</option>
                  <option value="Alvorada">Alvorada</option>
                  <option value="Campo Grande">Campo Grande</option>
                  <option value="Cominese">Cominese</option>
                  <option value="Emboguaçu">Emboguaçu</option>
                  <option value="Industrial">Industrial</option>
                  <option value="Jardim Eldorado">Jardim Eldorado</option>
                  <option value="Jardim Guaraituba">Jardim Guaraituba</option>
                  <option value="Jardim Ouro Fino">Jardim Ouro Fino</option>
                  <option value="Jardim Samambaia">Jardim Samambaia</option>
                  <option value="Joao Gualberto">João Gualberto</option>
                  <option value="Nilson Neves">Nilson Neves</option>
                  <option value="Palmital">Palmital</option>
                  <option value="Ponta do Caju">Ponta do Caju</option>
                  <option value="Raia">Raia</option>
                  <option value="Tuiuti">Tuiuti</option>
                  <option value="Vila Cruzeiro">Vila Cruzeiro</option>
                  <option value="Vila dos Comerciários">Vila dos Comerciários</option>
                  <option value="Vila Guarani">Vila Guarani</option>
                  <option value="Vila Paraíso">Vila Paraíso</option>
                  <option value="Vila Primavera">Vila Primavera</option>
                  <option value="Vila Santa Maria">Vila Santa Maria</option>
                  <option value="Vila Sao Vicente">Vila São Vicente</option>
                </select>              
           
                @if ($errors->has('endereco'))
                <span class="invalid-feedback" role="alert">
                  <strong> Insira um bairro válido</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input placeholder="Nº da casa" class="form-control" name="num_casa" required>
              </div>
              <div class="col-md-5">
                <input type="tel" placeholder="Telefone" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" required>
                @if ($errors->has('telefone'))
                <span class="invalid-feedback" role="alert">
                  <strong> Insira um telefone válido</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <input placeholder="Nº Apto, Complemento, Referência" class="form-control" name="comple">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-lg btn-block">
                  <b>Cadastrar
                  <i class="fa fa-check-circle" aria-hidden="true"></i></b>
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-sm-5">
          <div class="card bg-light mb-3" style="max-width: 100%;">
            <div class="card-header" style="background-color: red; color: white"> <b style="font-size: 18px"> Já é cadastrado? </b></div>
            <div class="card-body">
              <form method="POST" class="needs-validation" novalidate action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                  <div class="col-md-3" align="right">
                  </div>
                  <div class="col-md-8" align="left">
                    <input id="email" type="email" placeholder="Digite seu e-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                      <strong>Preenche um e-mail válido.</strong>
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
                      <strong>Preencha com uma senha válida.</strong>
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
                      <b> {{ __('ENTRAR') }} </b>
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
</div>

<div id="loginMobile">
  <div class="container">
    <p id="fonte" style="text-align:center; color:white; font-size: 25px; margin-top:-60px"> Seu primeiro pedido? </p>
    <div style="text-align:center">
      <a href="{{ url('register')}}" style="width: 90%;" class="btn btn-success"> <b> <i class="fas fa-user-plus"></i> CADASTRAR-SE </b> </a> <br><br>
      <div class="col-sm-5">
        <div class="card bg-light mb-3" style="max-width: 100%;">
          <div class="card-header" style="background-color: #DF0101; color: white"> <b style="font-size: 18px"> Já é cadastrado? </b></div>
          <div class="card-body">
            <form method="POST" class="needs-validation" novalidate action="{{ route('login') }}">
              @csrf

              <div class="form-group row">
                <div class="col-md-3" align="right">
                </div>
                <div class="col-md-8" align="left">
                  <input id="email" type="email" placeholder="Digite seu e-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>Preenche um e-mail válido.</strong>
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
                    <strong>Preencha com uma senha válida.</strong>
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
                    <b> {{ __('ENTRAR') }} </b>
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
