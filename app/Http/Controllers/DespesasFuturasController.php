<?php

namespace App\Http\Controllers;

use App\DespesaFutura;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DespesaFuturaRequest;

class DespesasFuturasController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null)
            $despesa_futura = DespesaFutura::orderBy('nome')->paginate(5);
        else 
            $despesa_futura = DespesaFutura::where('nome', 'like', '%'.$filtragem.'%')->orderBy("nome")->paginate(20);

        return view('despesasfuturas.index', ['despesa_futura'=>$despesa_futura]);
    }

    public function create() {
        return view('despesasfuturas.create');
    }

    public function store(DespesaFuturaRequest $request) {
        $nova_despesa_futura = $request->all();
        DespesaFutura::create($nova_despesa_futura);
        return redirect()->route('despesasfuturas');
    }

    public function destroy($id) {
        try {
            DespesaFutura::find($id)->delete();
            $ret = array('status'=>'ok', 'msg'=>"null");
            
        } catch (Exception $e) {
            $ret = $ret = array('status'=>'erro', 'msg'=>e.getMessage());
        } catch (\PDOException $e) {
            $ret = $ret = array('status'=>'erro', 'msg'=>e.getMessage());
        }
        return $ret;
    }

    public function edit($id)  {
        $despesa_futura = DespesaFutura::find($id);
        return view('despesasfuturas.edit', compact('despesa_futura'));
    }

    public function update(DespesaFuturaRequest $request, $id) {
        DespesaFutura::find($id)->update($request->all());
        return redirect()->route('despesasfuturas');
    }

    public function geraPdf(){
        $despesa_futura = DespesaFutura::all();

        $view = \View::make('despesasfuturas.relatorio', ['despesa_futura' => $despesa_futura]);
        $html = $view->render();
        $pdf = \PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');

        return $pdf->download('relatatorio.pdf');
    }
}
