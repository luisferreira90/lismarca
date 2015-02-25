@extends('layouts.layout')

@section('content')

<br><br><br>
<div id="registration">

	{{ Form::open(array('action' => 'UsersController@store')) }}
		{{ Form::label('name', 'Nome') }}
		{{ Form::text('name') }}
		<br>
		{{ Form::label('email', 'E-mail') }}
		{{ Form::email('email') }}
		<br>
		{{ Form::label('phone', 'Telefone') }}
		{{ Form::text('phone') }}
		<br>
		{{ Form::label('password', 'Palavra-passe') }}
		{{ Form::password('password') }}
		<br>
		{{ Form::submit('Registar') }}

	{{ Form::close() }}
	
</div>



@stop