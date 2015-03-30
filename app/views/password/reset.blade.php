@extends('layouts.layout')

@section('content')

<div>

{{ Form::open(array('action' => 'RemindersController@postReset', 'method' => 'post')) }}

    {{ Form::hidden('token', $token) }}

    {{Form::label('email', 'E-mail')}}
    {{ Form::email('email') }}

    <div class = 'form-element'>
            <div class = 'form-left'>
                {{Form::label('password', Lang::get('strings.password'))}}
                {{Form::password('password')}}
            </div>
            <div id = 'passwordCheck' class = 'form-error'></div>
        </div>

        <div class = 'form-element'>
            <div class = 'form-left'>
                {{Form::label('password_confirmation',Lang::get('strings.password_repeat'))}}
                {{Form::password('password_confirmation')}}
            </div>
        </div>

    {{Form::submit(Lang::get('strings.submit'),array('id' => 'submit'))}}

{{ Form::close() }}

</div>



@stop