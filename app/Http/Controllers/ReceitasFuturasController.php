<?php

namespace App\Http\Controllers;

use App\ReceitaFutura;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaFuturaRequest;

class ReceitasFuturasController extends Controller
{
    public function index(Request $filtro) {
        // $filtragem = $filtro->get('filtragem');
        // if($filtragem == null)
        //     $receita_futura = ReceitaFutura::orderBy('nome')->paginate(5);
        // else 
        //     $receita_futura = ReceitaFutura::where('nome', 'like', '%'.$filtragem.'%')->orderBy("nome")->paginate(20);

        // return view('receitasfuturas.index', ['receita_futura'=>$receita_futura]);
        $receitas_futuras = ReceitaFutura::all();
        return view('receitasfuturas.index', ['receitas_futuras'=>$receitas_futuras]);
    }

    public function create() {
        return view('receitasfuturas.create');
    }

    public function store(ReceitaFuturaRequest $request) {
        $nova_receita_futura = $request->all();
        ReceitaFutura::create($nova_receita_futura);
        return redirect()->route('receitasfuturas');
    }

    public function destroy($id) {
        try {
            ReceitaFutura::find($id)->delete();
            $ret = array('status'=>'ok', 'msg'=>"null");
            
        } catch (Exception $e) {
            $ret = $ret = array('status'=>'erro', 'msg'=>e.getMessage());
        } catch (\PDOException $e) {
            $ret = $ret = array('status'=>'erro', 'msg'=>e.getMessage());
        }
        return $ret;
    }

    public function edit($id)  {
        $receita_futura = ReceitaFutura::find($id);
        return view('receitasfuturas.edit', compact('receita_futura'));
    }

    public function update(ReceitaFuturaRequest $request, $id) {
        ReceitaFutura::find($id)->update($request->all());
        return redirect()->route('receitasfuturas');
    }

    // public function geraPdf(){
    //     $receita_futura = ReceitaFutura::all();

    //     $view = \View::make('receitasfuturas.relatorio', ['receita_futura' => $receita_futura]);
    //     $html = $view->render();
    //     $pdf = \PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');

    //     return $pdf->download('relatatorio.pdf');
    // }
}
