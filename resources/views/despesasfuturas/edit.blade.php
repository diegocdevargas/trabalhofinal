@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Editando Despesa Futura 
{{--         @if ($receita->tipo == 'R')
            <td>Receita</td>
        @elseif ($receita->tipo == 'D')
            <td>Despesa</td>
        @endif  --}}
        {{ $despesa_futura->nome }}</h3>

        {!! Form::open(['route' => ["despesasfuturas.update", $despesa_futura->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $despesa_futura->nome, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::number('valor', $despesa_futura->valor, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('prioridade', 'Prioridade:') !!}
                {!! Form::select('prioridade',
                    array('A' => 'Alta', 'M' => 'Média', 'B' => 'Baixa'),
                    $despesa_futura->prioridade,
                    ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data', 'Data:') !!}
                {!! Form::date('data',
                $despesa_futura->data,
                ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('info_adc', 'Informação Adicional:') !!}
                {!! Form::textarea('info_adc', $despesa_futura->info_adic, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar Despesa Futura', ['class'=>'btn btn-primary']) !!}
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