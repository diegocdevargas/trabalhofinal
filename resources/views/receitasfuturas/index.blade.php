@extends('adminlte::default')

@section('content')
    <h1>Receitas Futuras</h1>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Receita</th>
                <th>Data Efetivação</th>
                <th>Data Finalização</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($receitas_futuras as $rece_fut)
            <tr>
                <td>{{ $rece_fut->receita->nome }}</td>
                <td>{{ $rece_fut->data_efetiva }}</td>
                <td>{{ $rece_fut->data_finalizacao }}</td>
                <td>
                    <a href="{{ route('receitasfuturas.edit', ['id'=>$rece_fut->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{ $rece_fut->id }})" class="btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a style="margin-top:10px;" href="{{ route('receitasfuturas.create') }}" class="btn btn-info">Novo</a>
 {{--    <a href="{{ route('receitasfuturas.relatorio') }}" class="btn btn-success">Gerar PDF</a> --}}
@endsection
@section('table-delete')
"receitasfuturas"
@endsection