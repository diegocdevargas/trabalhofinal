<?php

namespace App\Http\Controllers;

use App\Receita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaRequest;

class ReceitasController extends Controller
{
    public function index(){
    	$receitas = Receita::all();
    	return view ('receitas.index', ['receitas'=>$receitas]);
    }

    public function create() {
        return view('receitas.create');
    }

    public function store(ReceitaRequest $request) {
        $nova_receita = $request->all();
        Receita::create($nova_receita);
        return redirect()->route('receitas');
    }

    public function edit($id)  {
        $receita = Receita::find($id);
        return view('receitas.edit', compact('receitas'));
    }

    public function update(ReceitaRequest $request, $id) {
        Receita::find($id)->update($request->all());
        return redirect()->route('receitas');
    }

}
