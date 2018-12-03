<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfild extends Model
{
    protected $fillable = ['nome', 'info_adic', 'despesa_id'];

    public function perfil_despesas() {
    	return $this->hasMany('App\PerfilDespesas');
    }
}
