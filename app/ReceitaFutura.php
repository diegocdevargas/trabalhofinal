<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceitaFutura extends Model
{
    protected $fillable = ['nome', 'prioridade', 'valor', 'data', 'info_adic'];
}
