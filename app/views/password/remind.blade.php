@extends('layouts.layout')

@section('content')

<div>

{{ Form::open(array('action' => 'RemindersController@postRemind', 'method' => 'post')) }}
    {{ Form::label('email','Email') }}
	{{ Form::email('email') }}
	{{ Form::submit('Reset') }}
{{ Form::close() }}

</div>

@stop