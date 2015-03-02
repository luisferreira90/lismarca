@extends('layouts.layout')

@section('content')

<br><br><br>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2>Registo</h2>
        {{ Form::open(array('route' => array('user.store'), 'method' => 'post')) }}
        <div>
            {{Form::label('name','Nome')}}
            {{Form::text('name')}}
        </div>
        <div>
            {{Form::label('email','E-mail')}}
            {{Form::email('email')}}
        </div>
        <div>
            {{Form::label('phone','Telefone')}}
            {{Form::text('phone')}}
        </div>
     	<div>
            {{Form::label('address','Morada')}}
            {{Form::text('address')}}
        </div>
        <div>
            {{Form::label('location','Localização')}}
            {{Form::text('location')}}
        </div>
        <div>
            {{Form::label('entity_type','Tipo de entidade')}}
            {{Form::text('entity_type')}}
        </div>
        <div>
            {{Form::label('company_name','Nome comercial da empresa')}}
            {{Form::text('company_name')}}
        </div>
        <div>
            {{Form::label('password','Palavra-passe')}}
            {{Form::password('password')}}
        </div>
        <div>
            {{Form::label('repeat_password','Repetir palavra-passe')}}
            {{Form::password('repeat_password')}}
        </div>
        {{Form::submit('Registar')}}
        {{ Form::close() }}
    </div>
</div>



@stop