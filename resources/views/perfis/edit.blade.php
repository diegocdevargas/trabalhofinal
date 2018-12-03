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

        {!! Form::open(['route' => ['perfis.update', $perfil->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('receita_id', 'Receita:') !!}
                {!! Form::select('receita_id', \App\Receita::orderBy('nome')->pluck('nome', 'id')->toArray(), $perfil->receita_id, ['class'=>'form-control']) !!}
            </div>
 
            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $perfil->nome, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('info_adic', 'Informação Adicional:') !!}
                {!! Form::text('info_adic', $perfil->info_adic, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Criar Históricos', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection