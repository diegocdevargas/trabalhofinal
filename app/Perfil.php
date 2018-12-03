<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['nome', 'info_adic', 'receita_id'];

    public function perfil_receitas() {
    	return $this->hasMany('App\PerfilReceitas');
    }
}
