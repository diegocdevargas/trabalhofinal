@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Editando Perfil</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ['perfisdespesas.update', $perfild->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('despesa_id', 'Despesa:') !!}
                {!! Form::select('despesa_id', \App\Despesa::orderBy('nome')->pluck('nome', 'id')->toArray(), $perfild->despesa_id, ['class'=>'form-control']) !!}
            </div>
 
            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $perfild->nome, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('info_adic', 'Informação Adicional:') !!}
                {!! Form::text('info_adic', $perfild->info_adic, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar Perfil', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection