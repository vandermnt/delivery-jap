<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminController extends Controller{
    public function __construct(){
      // this->middleware('auth');
    }

    public function index(){
      return view('pedidosAdm');
    }

    public function login(){
      return view('auth.loginAdm');
    }

    public function logout(){
      auth()->guard('admin')->logout();
      return redirect('/admin/login');
    }

    public function postLogin(Request $request){
      $validator = validator($request->all(), [
        'email' => 'required|min:3|max:100',
        'password' => 'required|min:3|max:100',
      ]);
      if($validator->fails()){
        return redirect('/admin/login')
            ->withErrors($validator)
            ->withInput();
      }

      $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];

      if(auth()->guard('admin')->attempt($credentials) ) {
        return redirect('/admin');
      }else{
        return redirect('/admin/login')
                  ->withErrors(['errors' => 'Login inválido'])
                  ->withInput();
      }
    }

    public function mostrarClientes(){
      $clientes = User::all();
      $total_clientes = User::count();


      return view('mostrarClientes')->with('clientes', $clientes)->with('total_clientes', $total_clientes);
    }
}
