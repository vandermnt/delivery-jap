<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model{

    public function compras(){
      return $this->belongsTo(Compra::class);
    }
}
