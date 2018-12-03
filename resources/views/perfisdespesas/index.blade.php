@extends('adminlte::default')

@section('content')
    <h1>Perfis Despesa</h1>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                
                <th>Despesa(s)</th>
                <th>Valor Despesa</th>
                <th>Info. Adicional</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($perfisd as $perfd)
            <tr>
                <td>
                    @foreach($perfd->perfil_despesas as $perd)
                        <li>{{ $perd->despesa->nome }}</li>
                    @endforeach
                </td>
                <td>
                    @foreach($perfd->perfil_despesas as $perd)
                        <li>{{ $perd->despesa->valor }}</li>
                    @endforeach
                </td>
                <td>{{ $perfd->info_adic }}</td>
                <td>
                    <a href="{{ route('perfisdespesas.edit', ['id'=>$perfd->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao({{$perfd->id}})" class="btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="text-align: center;">
            {{ $perfisd->links() }}
        </div>
    <a style="margin-top:10px" href="{{ route('perfisdespesas.createmaster') }}" class="btn btn-info">Novo</a>
@endsection
@section("table-delete")
"perfisdespesas"
@endsection