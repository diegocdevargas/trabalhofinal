@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Nova Despesa Futura</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'despesasfuturas.store']) !!}

            <div class="form-group">
                {!! Form::label('despesa_id', 'Despesa:') !!}
                {!! Form::select('despesa_id', \App\Despesa::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) !!}
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
                {!! Form::submit('Criar Despesa Futura', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection