@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h1>Receitas</h1>

        {!! Form::open(['name'=>'form_name', 'route'=>'receitas']) !!}
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
            @foreach($receitas as $rec)
                <tr>
                    <td>{{ $rec->nome }}</td>
                    @if ($rec->prioridade == 'A')
                        <td>Alta</td>
                    @elseif ($rec->prioridade == 'M')
                        <td>Média</td>
                    @elseif ($rec->prioridade == 'B') 
                        <td>Baixa</td>   
                    @endif 
                    <td>{{ $rec->valor }}</td>
                    <td>{{ $rec->data }}</td>
                    <td>{{ $rec->info_adic }}</td>
                    <td>
                        <a href="{{ route('receitas.edit', ['id'=>$rec->id]) }}" class="btn-sm btn-success">Editar</a>
                        {{-- <a href="{{ route('habitos.destroy', ['id'=>$hab->id]) }}" class="btn-sm btn-danger">Excluir</a> --}}
                        <a href="#" onclick="return ConfirmaExclusao({{ $rec->id }})" class="btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center;">
            {{ $receitas->links() }}
        </div>
        <br/>
        <a href="{{ route('receitas.create') }}" class="btn btn-info">Novo</a>
        <a href="{{ route('receitas.relatorio') }}" class="btn btn-success">Gerar PDF</a>
    </div>
@endsection

@section('table-delete')
"receitas"
@endsection