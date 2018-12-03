<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\PerfilReceitas;
use App\Http\Requests\PerfisRequest;

class PerfisController extends Controller
{
    public function index(Request $filtro){
    	// $perfis = Perfil::all();
    	// return view ('perfis.index', ['perfis'=>$perfis]);
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null)
            $perfis = Perfil::orderBy('nome')->paginate(2);
        else 
            $perfis = Perfil::where('nome', 'like', '%'.$filtragem.'%')->orderBy("nome")->paginate(2);

        return view('perfis.index', ['perfis'=>$perfis]);
    }

    public function create(){
    	return view('perfis.create');
    }

    public function store(PerfisRequest $request){
    	$novo_perfil = $request->all();
    	Perfil::create($novo_perfil);

    	return redirect()->route('perfis');
    }

    // public function destroy($id){
    // 	Historico::find($id)->delete();
    // 	return redirect()->route('historicos');
    // }

    public function destroy($id){
        try {
            PerfilReceitas::where("perfil_id", $id)->delete();
            Perfil::find($id)->delete();
            $ret = array('status'=>'ok', 'msg'=>"null");
            
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit($id){
    	$perfil = Perfil::find($id);
    	return view('perfis.edit', compact('perfil'));
    }

    public function update(PerfisRequest $request, $id){
    	Perfil::find($id)->update($request->all());
    	return redirect()->route('perfis');
    }

    public function createmaster(){
        return view('perfis.masterdetail');
    }

    public function masterdetail(Request $request){
        $perfil = Perfil::create([
            'nome' => $request->get('nome'),
            'info_adic' => $request->get('info_adic')
        ]);

        $itens = $request->itens;
        foreach ($itens as $key => $value) {
            PerfilReceitas::create([
                'perfil_id' => $perfil->id,
                'receita_id'    => $itens[$key] 
            ]);
        }

        return redirect()->route('perfis');
    }
}
