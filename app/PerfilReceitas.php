<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilReceitas extends Model
{
    protected $fillable = ['perfil_id', 'receita_id'];

    public function receita(){
    	return $this->belongsTo('App\Receita');
    }
}

