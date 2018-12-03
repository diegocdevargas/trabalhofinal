<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilDespesas extends Model
{
    protected $fillable = ['perfild_id', 'despesa_id'];

    public function despesa(){
    	return $this->belongsTo('App\Despesa');
    }
}
