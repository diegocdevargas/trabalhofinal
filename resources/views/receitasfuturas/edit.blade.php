@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Editando Receita Futura</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ['receitasfuturas.update', $receita_futura->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('receita_id', 'Receita:') !!}
                {!! Form::select('receita_id', \App\Receita::orderBy('nome')->pluck('nome', 'id')->toArray(), $receita_futura->receita_id, ['class'=>'form-control']) !!}
            </div>
 
            <div class="form-group">
                {!! Form::label('data_efetiva', 'Data Efetiva:') !!}
                {!! Form::date('data_efetiva', $receita_futura->data_efetiva, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data_finalizacao', 'Data Finalização:') !!}
                {!! Form::date('data_finalizacao', $receita_futura->data_finalizacao, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection