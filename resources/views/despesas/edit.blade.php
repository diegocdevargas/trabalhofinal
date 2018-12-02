@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Editando Despesa  
{{--         @if ($receita->tipo == 'R')
            <td>Receita</td>
        @elseif ($receita->tipo == 'D')
            <td>Despesa</td>
        @endif  --}}
        {{ $despesa->nome }}</h3>

        {!! Form::open(['route' => ["despesas.update", $despesa->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $despesa->nome, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::number('valor', $despesa->valor, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('prioridade', 'Prioridade:') !!}
                {!! Form::select('prioridade',
                    array('A' => 'Alta', 'M' => 'Média', 'B' => 'Baixa'),
                    $despesa->prioridade,
                    ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data', 'Data:') !!}
                {!! Form::date('data',
                $despesa->data,
                ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('info_adc', 'Informação Adicional:') !!}
                {!! Form::textarea('info_adc', $despesa->info_adic, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar Despesa', ['class'=>'btn btn-primary']) !!}
            </div>

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        {!! Form::close() !!}
    </div>
@endsection