@extends('admin.layouts.layout')

@section('content')

<h1>Editar utilizador</h1>

<div>
{{ Form::model($user, array('route' => array('user.update', $user->id))) }}

<div class = 'form-element'>
            <div class = 'form-left'>
                {{Form::label('name', Lang::get('strings.name'))}}
                {{Form::text('name')}}
            </div>
            <div id = 'nameCheck' class = 'form-error'></div>
        </div>

        <div class = 'form-element'>
            <div class = 'form-left'>
                {{Form::label('email','Email')}}
                {{Form::email('email')}}
            </div>
            <div id = 'emailCheck' class = 'form-error'></div>
        </div>

        <div class = 'form-element'>
            <div class = 'form-left'>
                {{Form::label('phone',Lang::get('strings.telephone'))}}
                {{Form::text('phone')}}
            </div>
            <div id = 'phoneCheck' class = 'form-error'></div>
        </div>

     	<div class = 'form-element'>
            <div class = 'form-left'>
                {{Form::label('address', Lang::get('strings.address'))}}
                {{Form::text('address')}}
            </div>
        </div>

        <div class = 'form-element'>
            <div class = 'form-left'>
                {{Form::label('location',Lang::get('strings.location'))}}
                {{Form::text('location')}}
            </div>
        </div>

        <div class = 'form-element'>
            <div class = 'form-left'>
                {{Form::label('entity_type',Lang::get('strings.entity_type'))}}
                {{Form::select('entity_type')}}
            </div>
        </div>

        <div class = 'form-element'>
            <div class = 'form-left'>
                {{Form::label('company_name',Lang::get('strings.company_name'))}}
                {{Form::text('company_name')}}
            </div>
        </div>

        <div class = 'form-element'>
            {{Form::submit(Lang::get('strings.submit'),array('id' => 'submit'))}}
        </div>
        {{ Form::close() }}
    </div>

@stop