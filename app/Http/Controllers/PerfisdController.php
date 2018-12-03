<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfild;
use App\PerfilDespesas;
use App\Http\Requests\PerfildRequest;

class PerfisdController extends Controller
{
    public function index(Request $filtro){
    	// $perfis = Perfil::all();
    	// return view ('perfis.index', ['perfis'=>$perfis]);
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null)
            $perfisd = Perfild::orderBy('nome')->paginate(2);
        else 
            $perfisd = Perfild::where('nome', 'like', '%'.$filtragem.'%')->orderBy("nome")->paginate(2);

        return view('perfisdespesas.index', ['perfisd'=>$perfisd]);
    }

    public function create(){
    	return view('perfisdespesas.create');
    }

    public function store(PerfisRequest $request){
    	$novo_perfild = $request->all();
    	Perfild::create($novo_perfild);

    	return redirect()->route('perfisdespesas');
    }

    // public function destroy($id){
    // 	Historico::find($id)->delete();
    // 	return redirect()->route('historicos');
    // }

    public function destroy($id){
        try {
            PerfilDespesas::where("perfild_id", $id)->delete();
            Perfild::find($id)->delete();
            $ret = array('status'=>'ok', 'msg'=>"null");
            
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit($id){
    	$perfild = Perfild::find($id);
    	return view('perfisdespesas.edit', compact('perfild'));
    }

    public function update(PerfisRequest $request, $id){
    	Perfild::find($id)->update($request->all());
    	return redirect()->route('perfisdespesas');
    }

    public function createmaster(){
        return view('perfisdespesas.masterdetail');
    }

    public function masterdetail(Request $request){
        $perfild = Perfild::create([
            'nome' => $request->get('nome'),
            'info_adic' => $request->get('info_adic')
        ]);

        $itens = $request->itens;
        foreach ($itens as $key => $value) {
            PerfilDespesas::create([
                'perfild_id' => $perfild->id,
                'despesa_id'    => $itens[$key] 
            ]);
        }

        return redirect()->route('perfisdespesas');
    }
}
