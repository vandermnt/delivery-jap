<?php

namespace App\Http\Controllers;

use Request;
use App\Carrinho;
use App\User;
use App\Http\Controllers\Auth;

class ContaUsuarioController extends Controller{

  public function contaUsuario(){
    $id = auth()->user()->id;

    $dados_user = User::find($id);

    return view('minhaConta')->with('dados_user', $dados_user);
  }

  public function meusDados(){
    $id = auth()->user()->id;

    $dados_user = User::find($id);
    return view('/meus-dados')->with('dados_user', $dados_user);
  }

  public function salvarAlteracaoMeusDados(){
    $id = auth()->user()->id;

    $dados_user = User::find($id);

    $dados_user->name = Request::input('nome');
    $dados_user->email = Request::input('email');
    $dados_user->cep = Request::input('cep');
    $dados_user->endereco = Request::input('endereco');
    $dados_user->bairro = Request::input('bairro');
    $dados_user->num_casa = Request::input('num_casa');
    $dados_user->telefone = Request::input('telefone');
    $dados_user->complemento = Request::input('comple');

    $dados_user->save();

    $sucess = 'sucess';

    return view('minhaConta')->with('dados_user', $dados_user)->with('sucess', $sucess);

  }

  public function updateSenha(){
    $id = auth()->user()->id;
    $dados_user = User::find($id);

    return view('alterarsenha');
  }

  public function verifica(){
    $id = auth()->user()->id;
    $dados_user = User::find($id);

    $senha_nova = bcrypt(Request::input('senha_nova'));

    $dados_user->password = $senha_nova;
    $sucess = 'sucesso';
    $dados_user->save();

    return view('minhaConta')->with('dados_user', $dados_user)->with('sucess', $sucess);

  }


  public function meusPedidos(){
    $id = auth()->user()->id;

    $meus_pedidox = Carrinho::where('id_usuario', '=', $id)->get();

    return view('/meus-pedidos')->with('meus_pedidox', $meus_pedidox);
  }

}
