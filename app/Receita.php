<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $fillable = ['nome', 'tipo', 'valor', 'data', 'info_adic'];
}
