<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DespesaFutura extends Model
{
    protected $fillable = ['nome', 'prioridade', 'valor', 'data', 'info_adic'];
}
