@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Editando Despesa Futura</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ['despesasfuturas.update', $despesa_futura->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('despesa_id', 'Despesa:') !!}
                {!! Form::select('despesa_id', \App\Despesa::orderBy('nome')->pluck('nome', 'id')->toArray(), $despesa_futura->despesa_id, ['class'=>'form-control']) !!}
            </div>
 
            <div class="form-group">
                {!! Form::label('data_efetiva', 'Data Efetiva:') !!}
                {!! Form::date('data_efetiva', $despesa_futura->data_efetiva, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data_finalizacao', 'Data Finalização:') !!}
                {!! Form::date('data_finalizacao', $despesa_futura->data_finalizacao, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection