@extends('layouts.layout')

@section('content')

<div class = 'form-wrap'>

{{ Form::open(array('action' => 'RemindersController@postRemind', 'method' => 'post')) }}

	<div class = 'form-group'>
	    {{ Form::label('email','Email') }}
		{{ Form::email('email', null, array('class' => 'form-control')) }}
	</div>

	<div class = 'form-group'>
		{{ Form::submit('Reset',array('id' => 'submit', 'class' => 'btn btn-primary')) }}
	</div>

{{ Form::close() }}

</div>

@stop

{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') }}