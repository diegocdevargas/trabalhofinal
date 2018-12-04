<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $fillable = ['nome', 'prioridade', 'valor', 'data', 'info_adic'];

    public function perfils(){
    	return $this->hasMany('App\Perfil');
    }

    public function despesas_futuras(){
    	return $this->hasMany('App\DespesaFutura');
    }
}
