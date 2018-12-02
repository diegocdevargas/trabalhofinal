@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Editando Receita Futura 
{{--         @if ($receita->tipo == 'R')
            <td>Receita</td>
        @elseif ($receita->tipo == 'D')
            <td>receita</td>
        @endif  --}}
        {{ $receita_futura->nome }}</h3>

        {!! Form::open(['route' => ["receitasfuturas.update", $receita_futura->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $receita_futura->nome, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::number('valor', $receita_futura->valor, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('prioridade', 'Prioridade:') !!}
                {!! Form::select('prioridade',
                    array('A' => 'Alta', 'M' => 'Média', 'B' => 'Baixa'),
                    $receita_futura->prioridade,
                    ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data', 'Data:') !!}
                {!! Form::date('data',
                $receita_futura->data,
                ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('info_adc', 'Informação Adicional:') !!}
                {!! Form::textarea('info_adc', $receita_futura->info_adic, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar receita Futura', ['class'=>'btn btn-primary']) !!}
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