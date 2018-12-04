@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Nova Receita Futura</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'receitasfuturas.store']) !!}

            <div class="form-group">
                {!! Form::label('receita_id', 'Receita:') !!}
                {!! Form::select('receita_id', \App\Receita::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) !!}
            </div>
 
            <div class="form-group">
                {!! Form::label('data_efetiva', 'Data Efetiva:') !!}
                {!! Form::date('data_efetiva', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data_finalizacao', 'Data Finalização:') !!}
                {!! Form::date('data_finalizacao', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Criar Receita Futura', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection