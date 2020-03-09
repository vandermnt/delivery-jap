@extends('principal')

@section('folderPrincipal')

@stop
@section('conteudo')
<div id="cont">
  <div class="col-sm-12">
    <div id="caixaFinalizarPedidos" style="margin-top:-50px">
      <h4 id="tamanhoM"> FINALIZAR PEDIDO <i class="fa fa-check-circle-o" aria-hidden="true"></i> </h4>
      <input id="aux_pedido" style="display:none" value="{{ $total_pedido }}"></input>
      <div class="row">
        <div class="col-sm-8">
          <form role="form"  name="dados" class="was-validated"  novalidate method="post" action=" {{ action('CompraController@salvarPedido') }}" onSubmit="return enviardados();" >
            <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
            <input id="t_p" type ="hidden" name="total_pedido" value="{{ $total_pedido }}">
            <input id="tx_entrega" type ="hidden" name="tx_entrega" value="">
            
            <hr style="margin-top: -10px">
            <h4 id="opFinalizarPedido">  OPÇÕES DE ENTREGA </h4>
            <div class="funkyradio">
              <div class="row">
                <div class="col-sm-5">
                  <div class="funkyradio-primary">
                    <input type="radio" value="Entrega domicilio" name="op_entrega" onclick="checky()" id="radio2" checked>
                    <label for="radio2" style="color: #424242;" > <b> <i class="fa fa-motorcycle" aria-hidden="true"></i> ENTREGA EM DOMICÍLIO </b> </label>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="funkyradio-success">
                    <input type="radio" value="Retirar no local" name="op_entrega" onclick="check()" id="radio3">
                    <label for="radio3" style="color: #424242"><b> <i class="fa fa-home" aria-hidden="true"></i> RETIRAR NO LOCAL </b></label>
                  </div>
                </div>
              </div>
            </div> <hr>
            <div id="entr" style="display:block">
              <h4 id="opFinalizarPedido"> ENDEREÇO DE ENTREGA </h4>
              
              <div class="row">
                <div class="col-sm-4">
                  <span> CEP: </spa>
                    <input type="number" class="form-control" name="cep" value="{{ $cep }}">
                  </div>
                  <div class="col-sm-8">
                    <span> Endereço: </spa>
                      <input class="form-control" name="endereco" value="{{ $endereco }}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <span> Nº: </spa>
                        <input type="number" class="form-control" name="num_casa" value="{{ $num_casa }}">
                      </div>
                      <div class="col-sm-4">
                        <span style="font-size:20"> Bairro: </span>
                        <select id="op_bairro" name="bairro" class="custom-select d-block w-100" onchange="opBairro()" required>
                          <option disabled="true" value="" selected="true">- SELECIONE O BAIRRO -</option>
                          <option value="29 de Julho - 5">29 de Julho - TAXA DE ENTREGA: 5,00</option>
                          <option value="Beira Rio - 7">Beira Rio - TAXA DE ENTREGA: 7,00</option>
                          <option value="Centro - 5">Centro- TAXA DE ENTREGA: 5,00</option>
                          <option value="Costeira - 6">Costeira - TAXA DE ENTREGA: 6,00</option>
                          <option value="Estradinha - 5">Estradinha - TAXA DE ENTREGA: 5,00</option>
                          <option value="Jardim America - 5">Jardim América - TAXA DE ENTREGA: 5,00</option>
                          <option value="Jardim Esperança - 10">Jardim Esperança - TAXA DE ENTREGA: 10,00</option>
                          <option value="Jardim Iguaçu - 7">Jardim Iguaçu - TAXA DE ENTREGA: 7,00</option>
                          <option value="Jardim Paraná - 10">Jardim Paraná - TAXA DE ENTREGA: 10,00</option>
                          <option value="Jardim Santa Rosa - 5">Jardim Santa Rosa - TAXA DE ENTREGA: 5,00</option>
                          <option value="Labra - 7">Labra - TAXA DE ENTREGA: 7,00</option>
                          <option value="Oceania - 6">Oceania - TAXA DE ENTREGA: 6,00</option>
                          <option value="Parque Agári - 7">Parque Agári - TAXA DE ENTREGA: 7,00</option>
                          <option value="Porto dos Padres - 5">Porto dos Padres - TAXA DE ENTREGA: 5,00</option>
                          <option value="Rocio - 5">Rocio - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vale do Sol - 10">Vale do Sol - TAXA DE ENTREGA: 10,00<</option>
                          <option value="Vila Divineia - 7">Vila Divinéia - TAXA DE ENTREGA: 7,00</option>
                          <option value="Vila Garcia - 10">Vila Garcia - TAXA DE ENTREGA: 10,00</option>
                          <option value="Vila Horizonte - 5">Vila Horizonte - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila Parangua - 5">Vila Paranguá - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila Rute - 5">Vila Rute - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila Sao Carlos - 10">Vila São Carlos - TAXA DE ENTREGA: 10,00</option>
                          <option value="Alto Sao Sebtastião - 5">Alto São Sebtastião - TAXA DE ENTREGA: 5,00</option>
                          <option value="Bockman - 5">Bockman - TAXA DE ENTREGA: 5,00</option>
                          <option value="Centro Histórico - 5">Centro Histórico - TAXA DE ENTREGA: 5,00</option>
                          <option value="Dom Pedro 2º - 6">Dom Pedro 2º - TAXA DE ENTREGA: 6,00</option>
                          <option value="Ilha dos Valadares - 10">Ilha dos Valadares - TAXA DE ENTREGA: 10,00</option>
                          <option value="Jardim Araça - 5">Jardim Araça - TAXA DE ENTREGA: 5,00</option>
                          <option value="Jardim Figueira - 10">Jardim Figueira - TAXA DE ENTREGA: 10,00</option>
                          <option value="Jardim Jacaranda - 10">Jardim Jacaranda - TAXA DE ENTREGA: 10,00</option>
                          <option value="Jardim Paranaguá - 10">Jardim Paranaguá - TAXA DE ENTREGA: 10,00</option>
                          <option value="Jardim Santos Dumont - 5">Jardim Santos Dumont - TAXA DE ENTREGA: 5,00</option>
                          <option value="Leblon - 5">Leblon - TAXA DE ENTREGA: 5,00</option>
                          <option value="Padre Jackson - 5">Padre Jackson - TAXA DE ENTREGA: 5,00</option>
                          <option value="Parque São João - 7">Parque São João - TAXA DE ENTREGA: 7,00</option>
                          <option value="Porto Seguro - 10">Porto Seguro - TAXA DE ENTREGA: 10,00</option>
                          <option value="Serraria do Rocha - 5">Serraria do Rocha - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila Alboit - 5">Vila Alboit - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila do Povo - 7">Vila do Povo - TAXA DE ENTREGA: 7,00</option>
                          <option value="Vila Guadalupe 5 ">Vila Guadalupe - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila Itiberê - 5">Vila Itiberê - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila Portuária - 6">Vila Portuária - TAXA DE ENTREGA: 6,00</option>
                          <option value="Vila Santa Helena - 7">Vila Santa Helena - TAXA DE ENTREGA: 7,00</option>
                          <option value="Vila Sao Jorge - 10">Vila São Jorge - TAXA DE ENTREGA: 10,00</option>
                          <option value="Alvorada - 5">Alvorada - TAXA DE ENTREGA: 5,00</option>
                          <option value="Campo Grande - 5">Campo Grande - TAXA DE ENTREGA: 5,00</option>
                          <option value="Cominese - 7">Cominese - TAXA DE ENTREGA: 7,00</option>
                          <option value="Emboguaçu - 5">Emboguaçu - TAXA DE ENTREGA: 5,00</option>
                          <option value="Industrial - 5">Industrial - TAXA DE ENTREGA: 5,00</option>
                          <option value="Jardim Eldorado - 5">Jardim Eldorado - TAXA DE ENTREGA: 5,00</option>
                          <option value="Jardim Guaraituba - 5">Jardim Guaraituba - TAXA DE ENTREGA: 5,00</option>
                          <option value="Jardim Ouro Fino - 10">Jardim Ouro Fino - TAXA DE ENTREGA: 10,00</option>
                          <option value="Jardim Samambaia - 7">Jardim Samambaia - TAXA DE ENTREGA: 7,00</option>
                          <option value="João Gualberto - 5">João Gualberto - TAXA DE ENTREGA: 5,00</option>
                          <option value="Nilson Neves - 7">Nilson Neves - TAXA DE ENTREGA: 7,00</option>
                          <option value="Palmital - 5">Palmital - TAXA DE ENTREGA: 5,00</option>
                          <option value="Ponta do Caju - 5">Ponta do Caju - TAXA DE ENTREGA: 5,00</option>
                          <option value="Raia - 5">Raia - TAXA DE ENTREGA: 5,00</option>
                          <option value="Tuiuti - 5">Tuiuti - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila Cruzeiro - 5">Vila Cruzeiro - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila dos Comerciários - 7">Vila dos Comerciários - TAXA DE ENTREGA: 7,00</option>
                          <option value="Vila Guarani - 5">Vila Guarani - TAXA DE ENTREGA: 5,00</option>
                          <option value="Vila Paraíso - 10">Vila Paraíso - TAXA DE ENTREGA: 10,00</option>
                          <option value="Vila Primavera - 6">Vila Primavera - TAXA DE ENTREGA: 6,00</option>
                          <option value="Vila Santa Maria - 10">Vila Santa Maria - TAXA DE ENTREGA: 10,00</option>
                          <option value="Vila Sao Vicente - 5">Vila São Vicente - TAXA DE ENTREGA: 5,00</option>
                        </select>              
                      </div>
                      <div class="col-sm-4">
                        <span> Apto/Complemento/Ref: </spa>
                          <input class="form-control" name="comple" value="{{ $complemento }}">
                        </div>
                      </div> <hr>
                    </div>
                    
                    <h4 id="opFinalizarPedido"> FORMAS DE PAGAMENTO </h4>
                    <select id="options" name="forma_pagamento" onchange="optionCheck()" class="custom-select" required>
                      <option disabled="true" value="" selected="true">- SELECIONE A FORMA DE PAGAMENTO -</option>
                      <option value="c_credito">CARTÃO DE CRÉDITO</option>
                      <option value="c_debito">CARTÃO DE DÉBITO</option>
                      <option value="dinheiro">DINHEIRO</option>
                    </select> <br><br>
                    
                    <div id="c_credito" style="display:none;">
                      <span> Selecione a bandeira: </span>
                      <select name="bandeira_credito" onchange="optionCheck()" class="form-control">
                        <option disabled="true" selected="true"> </option>
                        <option value="master">VISA</option>
                        <option value="master">ELO</option>
                        <option value="master">SENFF</option>
                        <option value="master">AURA</option>
                        <option value="master">JCB</option>
                        <option value="master">CABRAL</option>
                        <option value="master">DINERS CLUB</option>
                        <option value="master">MASTER CARD</option>
                      </select>
                    </div>
                    
                    <div id="c_debito" style="display:none">
                      <span> Selecione a bandeira: </span>
                      <select name="bandeira_debito" onchange="optionCheck()" class="form-control">
                        <option disabled="true" selected="true">  </option>
                        <option value="master">VISA</option>
                        <option value="master">ELO</option>
                        <option value="master">SENFF</option>
                        <option value="master">AURA</option>
                        <option value="master">JCB</option>
                        <option value="master">CABRAL</option>
                        <option value="master">DINERS CLUB</option>
                        <option value="master">MASTER CARD</option>
                      </select>
                    </div>
                    
                    <input id="dinheiro"  name="dinheiro" class="form-control" class="form-control" placeholder="Socilitar troco para: " onchange="optionCheck()" style="display: none;" onKeyPress="return(moeda(this,'.',',',event))"><hr>
                    <h4 id="opFinalizarPedido"> OBSERVAÇÕES: </h4>
                    <input class="form-control" name="obs" class="form-control" placeholder="Observações: ..."> <br>
                    <b><span style="color: black" id="label_taxa"> TAXA ENTREGA: </span></b>
                    <div class="alert alert-secondary" style="text-align: center" role="alert">
                      <?php $valor_formatado = number_format($total_pedido, 2, ',', '.'); ?>
                      <b id="total_p"> TOTAL DO PEDIDO: R$ {{ $valor_formatado}} <b>
                      </div>
                      <button type="submit" class="btn btn-success btn-lg btn-block"> <b style="font-family:'Open Sans', sans-serif;"> <i class="fas fa-check"></i> FINALIZAR </b> </button>
                    </form>
                  </div>
                  <div class="col-sm-12" id="telaGrande">
                    <div class="card">
                      <h5 id="fonteMeuPedido" class="card-header" style="background:#FE2E2E;"><i class="fa fa-file-text-o" aria-hidden="true"></i>
                        Meu Pedido</h5>
                        <div class="card-body">
                          @foreach($compras_em_aberto as $c)
                          <div  class="row" style="font-family: 'Signika', sans-serif; font-size:18px;">
                            <div class="col-sm-8">
                              <p> {{$c->nome}} - {{$c->sabor}} </p>
                            </div>
                            <div class="col-sm-4">
                              <p style="float:right"> Qtde: {{ $c->qtde_produto }} </p>
                            </div>
                            <div class="col-sm-12">
                              <!-- <i class="fa fa-trash-o" aria-hidden="true"></i> -->
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            
            <script type="text/javascript">
            function optionCheck(){
              var option = document.getElementById("options").value;
              if(option == "c_credito"){
                document.getElementById("c_credito").style.display ="block";
                document.getElementById("c_debito").style.display ="none";
                document.getElementById("dinheiro").style.display ="none";
                
                
              }
              else if(option == "c_debito"){
                document.getElementById("c_debito").style.display ="block";
                document.getElementById("c_credito").style.display ="none";
                document.getElementById("dinheiro").style.display ="none";
                
              }
              else if(option == "dinheiro"){
                document.getElementById("c_debito").style.display ="none";
                document.getElementById("c_credito").style.display ="none";
                document.getElementById("dinheiro").style.display ="block";
              }
            }
            
            function check(){
              var total_aux = document.getElementById("aux_pedido").value;
              
              total_pedido = parseFloat(total_aux);
              total_pedido = total_pedido.toLocaleString('pt-br', {minimumFractionDigits: 2});
              
              document.getElementById("entr").style.display = "none";
              document.getElementById('total_p').innerHTML = "TOTAL DO PEDIDO: "+total_pedido;
              document.getElementById('label_taxa').innerHTML = "TAXA ENTREGA: 0,00";
              document.getElementById('t_p').value = total_aux;
              
              
            }
            function checky(){
              document.getElementById('op_bairro').value = "";
              document.getElementById("entr").style.display = "block";
            }
            
            function enviardados(){
              if(document.getElementById("entr").style.display != "none"){
                if(document.dados.op_bairro.value==""){
                  alert( "Selecione o bairro!" );
                  document.dados.op_bairro.focus();
                  return false;
                }
                
                if(document.dados.options.value==""){
                  alert( "Selecione a forma de pagamento!" );
                  document.dados.options.focus();
                  return false;
                }
              }else{
                if(document.dados.options.value==""){
                  alert( "Selecione a forma de pagamento!" );
                  document.dados.options.focus();
                  return false;
                }
              }
            }
            
            </script>
            
            
            <script type="text/javascript">
            
            function opBairro(){
              var option = document.getElementById("op_bairro").value;
              var total_pedido = document.getElementById("aux_pedido").value;
              var taxa = option.split(" - ");	
              
              
              var total = parseFloat(total_pedido) + parseFloat(taxa[1]);
              
              var totaln = total.toLocaleString('pt-br', {minimumFractionDigits: 2});
              var tx = parseFloat(taxa[1]);
              tx = tx.toLocaleString('pt-br', {minimumFractionDigits: 2});
              document.getElementById('total_p').innerHTML = "TOTAL DO PEDIDO: "+totaln;
              document.getElementById('label_taxa').innerHTML = "TAXA ENTREGA: "+tx;
              document.getElementById('t_p').value = total;
              document.getElementById('tx_entrega').value = tx;
              
            }
            </script>
            
            <script language="javascript">   
            function moeda(a, e, r, t) {
              let n = ""
              , h = j = 0
              , u = tamanho2 = 0
              , l = ajd2 = ""
              , o = window.Event ? t.which : t.keyCode;
              if (13 == o || 8 == o)
              return !0;
              if (n = String.fromCharCode(o),
              -1 == "0123456789".indexOf(n))
              return !1;
              for (u = a.value.length,
                h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
                ;
                for (l = ""; h < u; h++)
                -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
                if (l += n,
                  0 == (u = l.length) && (a.value = ""),
                  1 == u && (a.value = "0" + r + "0" + l),
                  2 == u && (a.value = "0" + r + l),
                  u > 2) {
                    for (ajd2 = "",
                    j = 0,
                    h = u - 3; h >= 0; h--)
                    3 == j && (ajd2 += e,
                      j = 0),
                      ajd2 += l.charAt(h),
                      j++;
                      for (a.value = "",
                      tamanho2 = ajd2.length,
                      h = tamanho2 - 1; h >= 0; h--)
                      a.value += ajd2.charAt(h);
                      a.value += r + l.substr(u - 2, u)
                    }
                    return !1
                  }
                  </script>  
                  @stop
