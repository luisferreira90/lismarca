@extends('layouts.layout')

@section('content')

<h1>Login</h1>

@if(Session::has('flash_message'))
    {{ Session::get('flash_message') }}
@endif

@if (Session::has('error'))
    {{ trans(Session::get('error')) }}
@elseif (Session::has('success'))
    {{ trans(Session::get('success')) }}
@endif

@foreach ($errors->all() as $message)
	<br>
	{{$message}}
@endforeach

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

<a href = 'passwordreset'><p>{{Lang::get('strings.password_forgot')}}</p></a>

</div>

@stop

{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') }}