@extends('principal')

@section('folderPrincipal')

@stop
@section('conteudo')
<?php date_default_timezone_set('America/Sao_Paulo'); ?>

<div id="telaGrande">
  <div class="container">
    <div class="col-sm-12">
      <div id="caixaFinalizarPedidos" style="text-align:center; margin-top:-55px">
        <form role="form" method="post" action=" {{ action('CompraController@salvarPedido') }}">
          <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
          <input type ="hidden" name="id_carrinho" value="{{ $objCarrinho->id }}">
        </form>
        <h4 id="tamanhoFontePC"> PEDIDO Nº {{ $objCarrinho->id }} </h4>
        <h4 id="tamanhoFontePC"> REGISTRADO COM SUCESSO <i class="fa fa-check-circle-o" aria-hidden="true"></i>  </h4> <hr>  <br>
        <h4 id="tamanhoj" style="color: #DF0101;margin-top:-15px"> ACOMPANHE SEU PEDIDO </h4>
        <b><p id="fonte" style="font-size:20px; margin-top:-12px; color: #0000FF"> Essa página será atualizada em tempo real. Não há necessidade de atualiza-lá! </p></b>
        <input type="text" name="usuario" id="usuario" value="{{ auth()->user()->id }}" style="display:none">
        <input type="text" name="id_car" id="id_car" value="{{ $objCarrinho->id }}" style="display:none">
        <table class="table table-bordered" style="text-align:left">
          <thead class="thead">
            <tr>
              <th scope="col" style="background-color: #CEF6CE; color: black; font-size:18px"><i class="fas fa-check"></i> - Pedido Registrado</th>
            </tr>
            <tr>
              <th scope="col" style="display:block; font-size:18px" id="n_aprovado"><i class="fas fa-hourglass-half"></i> - Pedido Aprovado</th>
            </tr>
            <tr>
              <th scope="col" style="display:none; background-color: #CEF6CE; color: black; font-size:18px" id="aprovado"><i class="fas fa-check"></i> - Pedido Aprovado</th>
            </tr>
            @if($objCarrinho->op_entrega == 'Entrega domicilio')
                <tr>
                  <th scope="col" style="display:block; font-size:18px" id="n_entrega"><i class="fas fa-hourglass-half"></i>  {{ $horas }} - Saiu para entrega</th>
                </tr>
                <tr>
                  <th scope="col" style="display:none; background-color: #CEF6CE; color: black; font-size:18px" id="entregado"><i class="fas fa-check"></i> - Saiu para entrega</th>
                </tr>
            @else
                <tr>
                  <th scope="col" style="display:block; font-size:18px" id="n_entrega"><i class="fas fa-hourglass-half"></i>  {{ $horas }} - Pronto para retirada</th>
                </tr>
                <tr>
                  <th scope="col" style="display:none; background-color: #CEF6CE; color: black; font-size:18px" id="entregado"><i class="fas fa-check"></i> - Pronto para retirada </th>
                </tr>
            @endif
          </thead>
        </table>
        <p id="fonte" style="text-align:center; color:black;font-size:20px;"> <i class="fas fa-motorcycle" style="font-size:25px;"></i> 30 M - Tempo estimado para entrega. </p>
      </div>
    </div>
  </div>
</div>

<div id="telaMobile">
  <div class="container">
    <div class="col-sm-12">
      <div id="caixaFinalizarPedidos" style="text-align:center; margin-top:-55px">
        <h4 id="tamanhoFonteMobile"> PEDIDO Nº {{ $objCarrinho->id }} </h4>
        <h4 id="tamanhoFonteMobile"> REGISTRADO COM SUCESSO <i class="fa fa-check-circle-o" aria-hidden="true"></i>  </h4> <hr>  <br>
        <h4 id="tamanhoJ" style="color: #DF0101;margin-top:-15px"> ACOMPANHE SEU PEDIDO </h4>
        <p style="font-size:12px; margin-top:-12px"> Essa página será <b> atualizada em tempo real </b>. </p>
        <input type="text" name="usuario" id="usuariom" value="{{ auth()->user()->id }}" style="display:none">
        <input type="text" name="id_car" id="id_carm" value="{{ $objCarrinho->id }}" style="display:none">
        <table class="table table-bordered" style="text-align:left">
          <thead class="thead">
            <tr>
              <th scope="col" style="background-color: #CEF6CE; color: black; font-size:18px"><i class="fas fa-check"></i>  {{ $horas }} - Pedido Registrado</th>
            </tr>
            <tr>
              <th scope="col" style="display:block; font-size:18px" id="ns"><i class="fas fa-hourglass-half"></i> - Pedido Aprovado</th>
            </tr>
            <tr>
              <th scope="col" style="display:none; background-color: #CEF6CE; color: black; font-size:18px" id="s"><i class="fas fa-check"></i> - Pedido Aprovado</th>
            </tr>
            
            @if($objCarrinho->op_entrega == 'Entrega domicilio')
            <tr>
              <th scope="col" style="display:block; font-size:18px" id="n_e"><i class="fas fa-hourglass-half"></i> - Saiu para entrega</th>
            </tr>
            <tr>
              <th scope="col" style="display:none; background-color: #CEF6CE; color: black; font-size:18px" id="e"><i class="fas fa-check"></i> - Saiu para entrega</th>
            </tr>
            @else
            <tr>
              <th scope="col" style="display:block; font-size:18px" id="n_e"><i class="fas fa-hourglass-half"></i> - Pronto para retirada</th>
            </tr>
            <tr>
              <th scope="col" style="display:none; background-color: #CEF6CE; color: black; font-size:18px" id="e"><i class="fas fa-check"></i> - Pronto para retirada</th>
            </tr>
            @endif
          </thead>
        </table>
        <p id="fonte" style="text-align:center; color:black;font-size:13px;"> <i class="fas fa-motorcycle" style="font-size:15px;"></i> 30 M - Tempo estimado para entrega. </p>
      </div>
    </div>
  </div>
</div>

<script>

setInterval(function(){

  let id_car = document.getElementById('id_car').value
  let user = document.getElementById('usuario').value
  const url = "http://japdelivery.com.br/api/statuspedido/"+user+'/'+id_car;
  axios.get(url)
  .then(response => {
    // alert(response.data.sucess.valor);
    if(response.data.sucess.compra_aprovada == false){
      document.getElementById("aprovado").style.display ="none";
      document.getElementById("n_aprovado").style.display ="block";
    }else if(response.data.sucess.compra_aprovada == true){
      document.getElementById("aprovado").style.display ="block";
      document.getElementById("n_aprovado").style.display ="none";
    }
  })
  .catch(error => {
    console.log(error)
  })
}, 1000);
</script>

<script>

setInterval(function(){

  let id_car = document.getElementById('id_carm').value
  let user = document.getElementById('usuariom').value
  const url = "http://japdelivery.com.br/api/statuspedido/"+user+'/'+id_car;
  axios.get(url)
  .then(response => {
    // alert(response.data.sucess.valor);
    if(response.data.sucess.compra_aprovada == false){
      document.getElementById("s").style.display ="none";
      document.getElementById("ns").style.display ="block";
    }else if(response.data.sucess.compra_aprovada == true){
      document.getElementById("s").style.display ="block";
      document.getElementById("ns").style.display ="none";
    }
  })
  .catch(error => {
    console.log(error)
  })
}, 500);
</script>

<script>
setInterval(function(){

  let id_car = document.getElementById('id_car').value
  let user = document.getElementById('usuario').value
  const url = "http://japdelivery.com.br/api/statuspedido/"+user+'/'+id_car;
  axios.get(url)
  .then(response => {
    if(response.data.sucess.status_entrega == false){
      document.getElementById("n_entrega").style.display ="block";
      document.getElementById("entregado").style.display ="none";

    } else if(response.data.sucess.status_entrega == true){
      document.getElementById("n_entrega").style.display ="none";
      document.getElementById("entregado").style.display ="block";

    }
  })
  .catch(error => {
    console.log(error)
  })
}, 1000);
</script>


<script>
setInterval(function(){

  let id_car = document.getElementById('id_carm').value
  let user = document.getElementById('usuariom').value
  const url = "http://japdelivery.com.br/api/statuspedido/"+user+'/'+id_car;
  axios.get(url)
  .then(response => {
    if(response.data.sucess.status_entrega == false){
      document.getElementById("n_e").style.display ="block";
      document.getElementById("e").style.display ="none";

    } else if(response.data.sucess.status_entrega == true){
      document.getElementById("n_e").style.display ="none";
      document.getElementById("e").style.display ="block";

    }
  })
  .catch(error => {
    console.log(error)
  })
}, 1000);
</script>
@stop
