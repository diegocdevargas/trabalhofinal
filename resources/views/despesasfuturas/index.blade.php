@extends('adminlte::default')

@section('content')
    <h1>Despesas Futuras</h1>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Despesa</th>
                <th>Data Efetivação</th>
                <th>Data Finalização</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($despesas_futuras as $desp_fut)
            <tr>
                <td>{{ $desp_fut->despesa->nome }}</td>
                <td>{{ $desp_fut->data_efetiva }}</td>
                <td>{{ $desp_fut->data_finalizacao }}</td>
                <td>
                    <a href="{{ route('despesasfuturas.edit', ['id'=>$desp_fut->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{ $desp_fut->id }})" class="btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a style="margin-top:10px;" href="{{ route('despesasfuturas.create') }}" class="btn btn-info">Novo</a>
 {{--    <a href="{{ route('despesasfuturas.relatorio') }}" class="btn btn-success">Gerar PDF</a> --}}
@endsection
@section('table-delete')
"despesasfuturas"
@endsection