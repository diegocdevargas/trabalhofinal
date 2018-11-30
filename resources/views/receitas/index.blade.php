@extends('adminlte::default')

@section('content')
	<h1>Receitas</h1>
	<ul>
		@foreach($receitas as $rec)
		<li>
			{{ $rec->nome }}
			{{ $rec->valor }}
		</li>
		<br/>
		@endforeach
	</ul>
@endsection
