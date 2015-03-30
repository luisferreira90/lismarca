@extends('layouts.layout')

@section('content')

<div>
    <h1>{{Lang::get('strings.registration')}}</h1>

    @foreach ($errors->all() as $message)
        <br>
        {{$message}}
    @endforeach

    <div class = 'form-wrap'>
        {{ Form::open(array('route' => array('user.store'), 'method' => 'post', 'data-toggle' => 'validator')) }}

        <div class = 'form-group'>
            <div class = 'form-left'>
                {{Form::label('name', Lang::get('strings.name'))}}
                {{Form::text('name', null, array('class' => 'form-control'))}}
            </div>            
            <div id = 'nameCheck' class = 'form-error'></div>
        </div>       

        <div class = 'form-group'>
            <div class = 'form-left'>
                {{Form::label('email','Email')}}
                {{Form::email('email', null, array('class' => 'form-control'))}}
            </div>
            <div id = 'emailCheck' class = 'form-error'></div>
        </div>

        <div class = 'form-group'>
            <div class = 'form-left'>
                {{Form::label('phone',Lang::get('strings.telephone'))}}
                {{Form::text('phone', null, array('class' => 'form-control'))}}
            </div>
            <div id = 'phoneCheck' class = 'form-error'></div>
        </div>

     	<div class = 'form-group'>
            <div class = 'form-left'>
                {{Form::label('address', Lang::get('strings.address'))}}
                {{Form::text('address', null, array('class' => 'form-control'))}}
            </div>
        </div>

        <div class = 'form-group'>
            <div class = 'form-left'>
                {{Form::label('location',Lang::get('strings.location'))}}
                {{Form::select('location', $locations, null, array('class' => 'form-control'))}}
            </div>
        </div>

        <div class = 'form-group'>
            <div class = 'form-left'>
                {{Form::label('entity_type',Lang::get('strings.entity_type'))}}
                {{Form::select('entity_type', $entity_types, null, array('class' => 'form-control'))}}
            </div>
        </div>

        <div class = 'form-group'>
            <div class = 'form-left'>
                {{Form::label('company_name',Lang::get('strings.company_name'))}}
                {{Form::text('company_name', null, array('class' => 'form-control'))}}
            </div>
        </div>

        <div class = 'form-group'>
            <div class = 'form-left'>
                {{Form::label('password', Lang::get('strings.password'))}}
                {{Form::password('password', array('class' => 'form-control'))}}
            </div>
            <div id = 'passwordCheck' class = 'form-error'></div>
        </div>

        <div class = 'form-group'>
            <div class = 'form-left'>
                {{Form::label('password_confirmation',Lang::get('strings.password_repeat'))}}
                {{Form::password('password_confirmation', array('class' => 'form-control'))}}
            </div>
        </div>

        <div class = 'form-group'>
            {{Form::submit(Lang::get('strings.submit'), array('id' => 'submit', 'class' => 'form-control'))}}
        </div>

        {{ Form::close() }}

    </div>
</div>

<script>
var submit = document.getElementById('submit');
var form = ['0', '0', '0', '0'];

function checkForm() {

    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var password = $("#password").val();
    var password_confirmation = $("#password_confirmation").val();
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(name.length < 2) {
        $("#nameCheck").html("O nome tem que ter pelo menos dois caracteres");
        form[0] = 0;
    }
    else {
        $("#nameCheck").html("");
        form[0] = 1;
    }

    if(!re.test(email)) {
        $("#emailCheck").html("Tem que inserir um endereço de email válido, no formato nome@dominio.com");
        form[1] = 0;    
    }
    else {
        $("#emailCheck").html("");
        form[1] = 1;
    }

    if(!/^\d+$/.test(phone)) {
        $("#phoneCheck").html("O número de telefone só pode conter algarismos");
        form[2] = 0;
        errors = true;  
    }
    else if(phone.length < 9) {
        $("#phoneCheck").html("O número de telefone tem que ter pelo menos 9 algarismos");  
        form[2] = 0;
    }
    else {
        $("#phoneCheck").html("");
        form[2] = 1;
    }

    if (password.length < 6) {
        $("#passwordCheck").html("A palavra-passe tem que ter pelo menos 6 caracteres");
        form[3] = 0;
     }
    else if (password != password_confirmation) {
        $("#passwordCheck").html("A palavra-passe não é igual");
        form[3] = 0;
    }
    else {
        $("#passwordCheck").html("");
        form[3] = 1;
    }
}

$(document).ready(function () {

    submit.disabled = validate();

    $("#name").keyup(validate);
    $("#email").keyup(validate);
    $("#phone").keyup(validate);
    $("#password").keyup(validate);
    $("#password_confirmation").keyup(validate);
});

function validate () {
    checkForm();
    for (i = 0; i<=form.length; i++) {
        if(form[i] == 0) {
            submit.disabled = true;
            return true;
        }
    }
    submit.disabled = false;
}
</script>

@stop

{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') }}