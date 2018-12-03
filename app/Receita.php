<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $fillable = ['nome', 'prioridade', 'valor', 'data', 'info_adic'];

    public function perfils(){
    	return $this->hasMany('App\Perfil');
    }
}

