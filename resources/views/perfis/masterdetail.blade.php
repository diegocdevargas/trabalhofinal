@extends('adminlte::default')

@section('content')
    <div class="container-fluid">
        <h3>Novo Perfil Receita</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'perfis.masterdetail']) !!}
 
            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'require']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('info_adic', 'Informação Adicional:') !!}
                {!! Form::text('info_adic', null, ['class'=>'form-control', 'require']) !!}
            </div>

            <hr/>

            <h4>Receitas</h4>

            <div class="input_fields_wrap"></div>
            <br/>

            <button style="float-right" class="add_field_button btn btn-sucess">Adicionar Receitas</button>

            <br/>
            <hr/>

            <div class="form-group">
                {!! Form::submit('Criar Perfil', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('dyn_scripts')
<script type="text/javascript">
    $(document).ready(function(){
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Addbutton ID

        $(add_button).click(function(e){
            var newField = '<div class="receita-container"><div style="width: 94%; float: left;" id="receita">{!! Form::select("itens[]", \App\Receita::orderBy("nome")->pluck("nome", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione uma Receita"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';

            $(wrapper).append(newField);
        });

        $(wrapper).on("click", ".remove_field", function(e){
            e.preventDefault(); $(this).parent('div').remove();
        });
    });
</script>
@endsection