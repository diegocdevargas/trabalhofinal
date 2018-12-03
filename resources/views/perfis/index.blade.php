@extends('adminlte::default')

@section('content')
    <h1>Perfis Receita</h1>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                
                <th>Receita(s)</th>
                <th>Valor Receita</th>
                <th>Info. Adicional</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($perfis as $perf)
            <tr>
                <td>
                    @foreach($perf->perfil_receitas as $per)
                        <li>{{ $per->receita->nome }}</li>
                    @endforeach
                </td>
                <td>
                    @foreach($perf->perfil_receitas as $per)
                        <li>{{ $per->receita->valor }}</li>
                    @endforeach
                </td>
                <td>{{ $perf->info_adic }}</td>
                <td>
                    <a href="{{ route('perfis.edit', ['id'=>$perf->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao({{$perf->id}})" class="btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="text-align: center;">
            {{ $perfis->links() }}
        </div>
    <a style="margin-top:10px" href="{{ route('perfis.createmaster') }}" class="btn btn-info">Novo</a>
@endsection
@section("table-delete")
"perfis"
@endsection