<?php

namespace App\Http\Controllers;

use App\Receita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaRequest;

class ReceitasController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null)
            $receitas = Receita::orderBy('nome')->paginate(5);
        else 
            $receitas = Receita::where('nome', 'like', '%'.$filtragem.'%')->orderBy("nome")->paginate(20);

        return view('receitas.index', ['receitas'=>$receitas]);
    }

    public function create() {
        return view('receitas.create');
    }

    public function store(ReceitaRequest $request) {
        $nova_receita = $request->all();
        Receita::create($nova_receita);
        return redirect()->route('receitas');
    }

    public function destroy($id) {
        try {
            Receita::find($id)->delete();
            $ret = array('status'=>'ok', 'msg'=>"null");
            
        } catch (Exception $e) {
            $ret = $ret = array('status'=>'erro', 'msg'=>e.getMessage());
        } catch (\PDOException $e) {
            $ret = $ret = array('status'=>'erro', 'msg'=>e.getMessage());
        }
        return $ret;
    }

    public function edit($id)  {
        $receita = Receita::find($id);
        return view('receitas.edit', compact('receita'));
    }

    public function update(ReceitaRequest $request, $id) {
        Receita::find($id)->update($request->all());
        return redirect()->route('receitas');
    }

    public function geraPdf(){
        $receitas = Receita::all();

        $view = \View::make('receitas.relatorio', ['receitas' => $receitas]);
        $html = $view->render();
        $pdf = \PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');

        return $pdf->download('relatatorio.pdf');
    }

}
