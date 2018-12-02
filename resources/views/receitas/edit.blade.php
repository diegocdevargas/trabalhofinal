@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Editando Receita {{ $receita->nome }}</h3>

        {!! Form::open(['route' => ["receitas.update", $receita->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $receita->nome, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::number('valor', $receita->valor, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('prioridade', 'Prioridade:') !!}
                {!! Form::select('prioridade',
                    array('A' => 'Alta', 'M' => 'Média', 'B' => 'Baixa'),
                    $receita->prioridade,
                    ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data', 'Data:') !!}
                {!! Form::date('data',
                $receita->data,
                ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('info_adc', 'Informação Adicional:') !!}
                {!! Form::textarea('info_adc', $receita->info_adic, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar Receita', ['class'=>'btn btn-primary']) !!}
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