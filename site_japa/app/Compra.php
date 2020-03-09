<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;

class Compra extends Model{

    protected $fillable = 'compras';

    public function carrinho(){
      return $this->belongsTo('App\Carrinho');
    }

    public function produtos(){
        return $this->hasMany('App\Produto');
    }
}
