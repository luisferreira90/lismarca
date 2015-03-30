@extends('layouts.layout')

@section('content')

@foreach ($errors->all() as $message)
	<br>
	{{$message}}
@endforeach

<h1>Lembrar password</h1>

<div class = 'form-wrap'>

{{ Form::open(array('url' => 'login', 'method' => 'post')) }}

	<div class = 'form-group'>
	    {{ Form::label('email','Email') }}
		{{ Form::email('email', null, array('class' => 'form-control')) }}
	</div>

	<div class = 'form-group'>
		{{ Form::label('password',Lang::get('strings.password')) }}
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>

	<div class = 'form-group'>
		{{ Form::submit('Login',array('id' => 'submit', 'class' => 'btn btn-primary')) }}
	</div>

{{ Form::close() }}

<a href = 'passwordreset'><p>Esqueci-me da palavra passe</p></a>

</div>

@stop

{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') }}