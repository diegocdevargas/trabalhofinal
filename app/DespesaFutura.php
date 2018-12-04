<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DespesaFutura extends Model
{
    protected $fillable = ['data_efetiva', 'data_finalizacao', 'info_adic', 'despesa_id'];

   public function despesa(){
    	return $this->belongsTo('App\Despesa');
    }
}
