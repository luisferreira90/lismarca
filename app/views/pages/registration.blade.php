@extends('layouts.layout')

@section('content')

<br><br><br>
<div>
    <div>
        <h2>Registo</h2>

        @foreach ($errors->all() as $message)
            <br>
            {{$message}}
        @endforeach

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
            {{Form::select('entity_type', $data)}}
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
            {{Form::label('password_confirmation','Repetir palavra-passe')}}
            {{Form::password('password_confirmation')}}
        </div>
        <div id="passwordCheck">
        </div>
        <div>
            {{Form::submit('Registar',array('id' => 'submit'))}}
        </div>
        {{ Form::close() }}
    </div>
</div>

<script>
function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#repeat_password").val();

    if (password != confirmPassword)
        $("#passwordCheck").html("Passwords do not match!");
    else
        $("#passwordCheck").html("Passwords match.");
}

$(document).ready(function () {
    $("#submit").disabled = true;
    $("#password").keyup(checkPasswordMatch);
    $("#repeat_password").keyup(checkPasswordMatch);
});
</script>



@stop