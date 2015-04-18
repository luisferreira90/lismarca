@extends('layouts.layout')

@section('content')

<h1>{{Lang::get('strings.password_reset_title')}}</h1>

@if (Session::has('error'))
    {{ trans(Session::get('error')) }}
@elseif (Session::has('success'))
    {{ trans(Session::get('success')) }}
@endif

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

{{ HTML::style('css/bootstrap.css') }}