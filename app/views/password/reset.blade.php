@extends('layouts.layout')

@section('content')

<div class = 'form-wrap'>

{{ Form::open(array('action' => 'RemindersController@postReset', 'method' => 'post')) }}

    {{ Form::hidden('token', $token) }}

    <div class = 'form-group'>
        {{Form::label('email', 'E-mail')}}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class = 'form-group'>
        {{Form::label('password', Lang::get('strings.password'))}}
        {{Form::password('password', array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('password_confirmation',Lang::get('strings.password_repeat'))}}
        {{Form::password('password_confirmation', array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit(Lang::get('strings.submit'),array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

{{ Form::close() }}

</div>

@stop

{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') }}