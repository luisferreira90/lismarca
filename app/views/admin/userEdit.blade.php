@extends('admin.layouts.layout')

@section('content')

<h1>Editar utilizador</h1>

<div>

{{ Form::model($user, array('route' => array('admin.user.update', $user->id), 'method' => 'PUT')) }}

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('name', 'Nome')}}
            {{Form::text('name')}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('email','Email')}}
            {{Form::email('email')}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('phone','Telefone')}}
            {{Form::text('phone')}}
        </div>
    </div>

 	<div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('address', 'Morada')}}
            {{Form::text('address')}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('location', 'Localização')}}
            {{Form::text('location')}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('entity_type', 'Tipo de entidade')}}
            {{Form::select('entity_type', $entities)}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('company_name', 'Nome da companhia')}}
            {{Form::text('company_name')}}
        </div>
    </div>

    <div class = 'form-element'>
        {{Form::submit('Gravar',array('id' => 'submit'))}}
    </div>

    {{ Form::close() }}

</div>

@stop