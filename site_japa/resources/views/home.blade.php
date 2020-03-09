@extends('principal')

@section('folderPrincipal')
<section id="pageintro" class="hoc clear">
  <div>
    <h4 id="japDelv" style="text-shadow: 3px 5px black;"><b>JAP RESTAURANT <br> DELIVERY</b></h4>
     <b> <p style="color: white; font-family: 'Rubik', sans-serif; font-size:20px">O pedido do tamanho da sua fome!</p> </b> 
    <footer><a class="btn btn-success btn-lg btn-block" href="{{ url('/pedido')}}"><b>FAÇA AGORA SEU PEDIDO </b></a></footer>
  </div>
</section>
@stop
@section('conteudo')

<div id="telaGrande" style="background-color: #2E2E2E">
  <div style="background-color: black">
    <div class="row">
      
      <div class="col-sm-12" align="center">
        <br>
        <div id="carouselExampleSlidesOnly" style="max-width:600px" class="carousel slide" data-interval="2000" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{url("/img/promo.jpeg")}}" class="d-block w-60" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{url("/img/promo1.jpeg")}}" class="d-block w-60" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{url("/img/promo2.jpeg")}}" class="d-block w-60" alt="...">
            </div>
          </div>
        </div>
      </div> <br>
    </div>
  </div>
  <div style="background-color: black">
    <div class="col-sm-12">
      <section class="hoc container clear">
        <!-- ################################################################################################ -->
        <!-- <div class="sectiontitle">
        <h6 class="heading">CONHEÇA NOSSAS PROMOÇÕES</h6>

      </div> -->
      <div class="row">
        <div class="col-sm-4">
          <div class="card-header text-white"> <b style="font-size:16px"> FORMAS DE PAGAMENTO </b> </div>
          <div class="card-body text-white">
            <img src="/img/cartaoVisa.png" style="max-width: 22rem; max-height: 35px; margin:5px">
            <img src="/img/cartaoElo.png" style="max-width: 22rem; max-height: 35px; margin:5px">
            <img src="/img/cartaoMasterCard.jpeg" style="max-width: 22rem; max-height: 35px; margin:5px">
            <img src="/img/cartaoJCB.jpeg" style="max-width: 22rem; max-height: 35px; margin:5px">
            <img src="/img/cartaoSenff.jpeg" style="max-width: 22rem; max-height: 35px; margin:5px">
            <img src="/img/cartao-aura.png" style="max-width: 22rem; max-height: 35px; margin:5px">
            <img src="/img/cartaoCabral.jpg" style="max-width: 22rem; max-height: 35px; margin:15px">
            <img src="/img/cartaoDieners.png" style="max-width: 22rem; max-height: 35px; margin:5px">
            <p style="font-size:15px">Dinheiro (R$); Cartão crédito (entregador); Cartão débito (entregador);</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card-header text-white"> <b style="font-size:16px"> TEMPO MÉDIO PRA ENTREGA </b> </div>
          <div class="card-body text-white">
            <div class="row">
              <div class="col-sm-4">
                <img id="relogio" src="/img/relogio-verde.svg" style="margin:5px;">
              </div>
              <div class="col-sm-8">
                <p style="font-size:35px; margin-top: 12px; color: #04B45F"> 40 M</p>
              </div>
            </div>
            <p style="font-size:15px;">O tempo da entrega é estimado de acordo com o número de pedidos do dia e pode mudar a qualquer momento.</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card-header text-white"> <b style="font-size:16px"> PEÇA TAMBÉM PELO TELEFONE </b> </div>
          <div class="card-body text-white">
            <div class="row">
              <div class="col-sm-12">
                <p style="font-size: 1.5vw; margin-top:37px;"> <b> <i style="color: red" class="fa fa-phone" aria-hidden="true"></i>
                  (41) 99945-5051 </b> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>


<div id="telaMobile" style="margin-top:-60px; background-color: black">
  <div class="">
    <div class="col-sm-12">
      <section class="hoc container clear">
        <div class="row">
          <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 22rem; height: 230px; background-color:black">
              <div class="card-header text-white"> <b> FORMAS DE PAGAMENTO </b> </div>
              <div class="card-body text-white">
                <img id="img" src="/img/cartaoVisa.png" style="max-width: 22rem; max-height: 35px; margin:5px">
                <img id="img" src="/img/cartaoElo.png" style="max-width: 22rem; max-height: 35px; margin:5px">
                <img id="img" src="/img/cartaoMasterCard.jpeg" style="max-width: 22rem; max-height: 35px; margin:5px">
                <img id="img" src="/img/cartaoJCB.jpeg" style="max-width: 22rem; max-height: 35px; margin:5px">
                <img id="img" src="/img/cartaoSenff.jpeg" style="max-width: 22rem; max-height: 35px; margin:5px">
                <img id="img" src="/img/cartao-aura.png" style="max-width: 22rem; max-height: 35px; margin:5px">
                <img id="img" src="/img/cartaoCabral.jpg" style="max-width: 22rem; max-height: 35px; margin:15px">
                <img id="img" src="/img/cartaoDieners.png" style="max-width: 22rem; max-height: 35px; margin:5px">

                <p id="fontM">Dinheiro (R$); Cartão crédito (entregador); Cartão débito (entregador);</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 22rem; height: 215px; background-color:black">
              <div class="card-header text-white"> <b> TEMPO MÉDIO PRA ENTREGA </b> </div>
              <div class="card-body text-white">
                <div class="row">
                  <div class="col-sm-4">
                    <img id="relogio" src="/img/iconeRelogio.png" style="margin:5px;">
                  </div>
                  <div class="col-sm-8">
                    <p style="font-size:50px; margin-top: -18px; color: green "> 40 M</p>
                  </div>
                </div>
                <p id="fontM" style="margin-top:-27px">O tempo da entrega é estimado de acordo com o número de pedidos do dia e pode mudar a qualquer momento.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 22rem; height: 128px; background-color:black">
              <div class="card-header text-white"> <b> PEÇA TAMBÉM PELO TELEFONE </b> </div>
              <div class="card-body text-white">
                <div class="row">
                  <div class="col-sm-12">
                    <p id="fontTel" style="margin-top:-8px"> <b> <i class="fa fa-phone" aria-hidden="true" style="color:green"></i>
                      (41) 99945-5051 </b> </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  @stop
