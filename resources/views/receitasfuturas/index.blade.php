@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h1>Receitas Futuras</h1>

        {!! Form::open(['name'=>'form_name', 'route'=>'receitasfuturas']) !!}
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
                    <th>Prioridade</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Info. Adicional</th>
                </tr>
            </thead>
            <tbody>
            @foreach($receita_futura as $rec_fu)
                <tr>
                    <td>{{ $rec_fu->nome }}</td>
                    @if ($rec_fu->prioridade == 'A')
                        <td>Alta</td>
                    @elseif ($rec_fu->prioridade == 'M')
                        <td>Média</td>
                    @elseif ($rec_fu->prioridade == 'B') 
                        <td>Baixa</td>   
                    @endif 
                    <td>{{ $rec_fu->valor }}</td>
                    <td>{{ $rec_fu->data }}</td>
                    <td>{{ $rec_fu->info_adic }}</td>
                    <td>
                        <a href="{{ route('receitasfuturas.edit', ['id'=>$rec_fu->id]) }}" class="btn-sm btn-success">Editar</a>
                        {{-- <a href="{{ route('habitos.destroy', ['id'=>$hab->id]) }}" class="btn-sm btn-danger">Excluir</a> --}}
                        <a href="#" onclick="return ConfirmaExclusao({{ $rec_fu->id }})" class="btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center;">
            {{ $receita_futura->links() }}
        </div>
        <br/>
        <a href="{{ route('receitasfuturas.create') }}" class="btn btn-info">Novo</a>
        <a href="{{ route('receitasfuturas.relatorio') }}" class="btn btn-success">Gerar PDF</a>
    </div>
@endsection

@section('table-delete')
"receitasfuturas"
@endsection