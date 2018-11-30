@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Novo Receita</h3>
        {!! Form::open(['route' => 'receitas.store']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::number('valor', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tipo', 'Tipo:') !!}
                {!! Form::select('tipo',
                    array('R' => 'Receita', 'D' => 'Despesas'),
                    'RD',
                    ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data', 'Data:') !!}
                {!! Form::date('data',
                '2017-05-18 00:00:00',
                ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('info_adic', 'Informação Adicional:') !!}
                {!! Form::textarea('info_adic', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Criar despesa', ['class'=>'btn btn-primary']) !!}
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