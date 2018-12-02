@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h1>Despesas Futuras</h1>

        {!! Form::open(['name'=>'form_name', 'route'=>'despesasfuturas']) !!}
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
            @foreach($despesa_futura as $des_fu)
                <tr>
                    <td>{{ $des_fu->nome }}</td>
                    @if ($des_fu->prioridade == 'A')
                        <td>Alta</td>
                    @elseif ($des_fu->prioridade == 'M')
                        <td>Média</td>
                    @elseif ($des_fu->prioridade == 'B') 
                        <td>Baixa</td>   
                    @endif 
                    <td>{{ $des_fu->valor }}</td>
                    <td>{{ $des_fu->data }}</td>
                    <td>{{ $des_fu->info_adic }}</td>
                    <td>
                        <a href="{{ route('despesasfuturas.edit', ['id'=>$des_fu->id]) }}" class="btn-sm btn-success">Editar</a>
                        {{-- <a href="{{ route('habitos.destroy', ['id'=>$hab->id]) }}" class="btn-sm btn-danger">Excluir</a> --}}
                        <a href="#" onclick="return ConfirmaExclusao({{ $des_fu->id }})" class="btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center;">
            {{ $despesa_futura->links() }}
        </div>
        <br/>
        <a href="{{ route('despesasfuturas.create') }}" class="btn btn-info">Novo</a>
        <a href="{{ route('despesasfuturas.relatorio') }}" class="btn btn-success">Gerar PDF</a>
    </div>
@endsection

@section('table-delete')
"despesasfuturas"
@endsection