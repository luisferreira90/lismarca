@extends('layouts.layout')

@section('content')

<div>

{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
	{{ Form::label('email','Email') }}
	{{ Form::email('email') }}
	{{ Form::label('password',Lang::get('strings.password')) }}
	{{ Form::password('password') }}
	{{ Form::submit('Login') }}
{{ Form::close() }}

</div>



@stop