<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projeto Rio Passo Fundo</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body bgcolor="#FFFFFF" data-spy="scroll" data-offset="0" data-target="#navigation">

    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>meuhabito.com</b></a>
            </div>
            <div class="navbar-collapse collapse">
                {{--<ul class="nav navbar-nav">
                    <li class="active"><a href="#desc" class="smoothScroll">Descrição do Jogo</a></li>
                    <li><a href="/projeto" class="smoothScroll">Projeto</a></li>
                    <li><a href="/contato" class="smoothScroll">Contato</a></li>
                </ul>--}}
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Entrar</a></li>
                        <!-- <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li> -->
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    {{--<br>--}}
        {{--<div class="container">--}}
            {{--<div class="row centered">--}}

            {{--<div class="col-md-12">--}}
                {{--<div class="col-md-4">--}}
                    {{--<a href="/projeto" class="button btn btn-block btn-danger btn-lg">Projeto Rio Passo Fundo</a>--}}
                {{--</div>--}}

                {{--<div class="col-md-4">--}}
                    {{--<a href="/jogo" class="button btn btn-block btn-success btn-lg"><b>Iniciar Jogo</b></a>--}}
                {{--</div>--}}

                {{--<div class="col-md-4">--}}
                    {{--<a href="/contato" class="button btn btn-block btn-primary btn-lg">Contate o Projeto</a>--}}
                {{--</div>--}}

            {{--</div>--}}
            {{----}}
            {{--</div>--}}
        {{--</div> <!--/ .container -->--}}
    
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
