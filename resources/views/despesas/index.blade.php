@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h1>Despesas</h1>

        {!! Form::open(['name'=>'form_name', 'route'=>'despesas']) !!}
            <div class="sidebar-form search-input">
                <div class="input-group input-group-lg">
                    <input type="text" name="filtragem" class="form-control" style="width:100%!important;" placeholder="Pesquisa...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        {!! Form::close() !!}

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Info. Adicional</th>
                </tr>
            </thead>
            <tbody>
            @foreach($despesas as $des)
                <tr>
                    <td>{{ $des->nome }}</td>
                    @if ($des->prioridade == 'A')
                        <td>Alta</td>
                    @elseif ($des->prioridade == 'M')
                        <td>Média</td>
                    @elseif ($des->prioridade == 'B') 
                        <td>Baixa</td>   
                    @endif
                    <td>{{ $des->valor }}</td>
                    <td>{{ $des->data }}</td>
                    <td>{{ $des->info_adic }}</td>
                    <td>
                        <a href="{{ route('despesas.edit', ['id'=>$des->id]) }}" class="btn-sm btn-success">Editar</a>
                        {{-- <a href="{{ route('habitos.destroy', ['id'=>$hab->id]) }}" class="btn-sm btn-danger">Excluir</a> --}}
                        <a href="#" onclick="return ConfirmaExclusao({{ $des->id }})" class="btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center;">
            {{ $despesas->links() }}
        </div>
        <br/>
        <a href="{{ route('despesas.create') }}" class="btn btn-info">Novo</a>
        <a href="{{ route('despesas.relatorio') }}" class="btn btn-success">Gerar PDF</a>
    </div>
@endsection

@section('table-delete')
"despesas"
@endsection