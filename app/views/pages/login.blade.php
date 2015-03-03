@extends('layouts.layout')

@section('content')

<div id="registration">

{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
	{{ Form::label('email','Email') }}
	{{ Form::email('email') }}
	{{ Form::label('password','Password') }}
	{{ Form::password('password') }}
	{{ Form::submit('Login') }}
{{ Form::close() }}

	
</div>



@stop