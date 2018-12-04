<?php

namespace App\Http\Controllers;

use App\Despesa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DespesaRequest;

class DespesasController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null)
            $despesas = Despesa::orderBy('nome')->paginate(2);
        else 
            $despesas = Despesa::where('nome', 'like', '%'.$filtragem.'%')->orderBy("nome")->paginate(4);

        return view('despesas.index', ['despesas'=>$despesas]);
    }

    public function create() {
        return view('despesas.create');
    }

    public function store(DespesaRequest $request) {
        $nova_despesa = $request->all();
        Despesa::create($nova_despesa);
        return redirect()->route('despesas');
    }

    public function destroy($id) {
        try {
            Despesa::find($id)->delete();
            $ret = array('status'=>'ok', 'msg'=>"null");
            
        } catch (Exception $e) {
            $ret = $ret = array('status'=>'erro', 'msg'=>e.getMessage());
        } catch (\PDOException $e) {
            $ret = $ret = array('status'=>'erro', 'msg'=>e.getMessage());
        }
        return $ret;
    }

    public function edit($id)  {
        $despesa = Despesa::find($id);
        return view('despesas.edit', compact('despesa'));
    }

    public function update(DespesaRequest $request, $id) {
        Despesa::find($id)->update($request->all());
        return redirect()->route('despesas');
    }

    public function geraPdf(){
        $despesas = Despesa::all();

        $view = \View::make('despesas.relatorio', ['despesas' => $despesas]);
        $html = $view->render();
        $pdf = \PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');

        return $pdf->download('relatatorio.pdf');
    }

}
