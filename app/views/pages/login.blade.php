@extends('layouts.layout')

@section('content')

@foreach ($errors->all() as $message)
	<br>
	{{$message}}
@endforeach

<div>

{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
	{{ Form::label('email','Email') }}
	{{ Form::email('email') }}
	{{ Form::label('password',Lang::get('strings.password')) }}
	{{ Form::password('password') }}
	{{ Form::submit('Login') }}
{{ Form::close() }}

<a href = 'passwordreset'><p>Esqueci-me da palavra passe</p></a>

</div>



@stop