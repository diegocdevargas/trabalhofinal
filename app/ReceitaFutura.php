<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceitaFutura extends Model
{
    protected $fillable = ['data_efetiva', 'data_finalizacao', 'info_adic', 'receita_id'];

    public function receita(){
    	return $this->belongsTo('App\Receita');
    }

}
