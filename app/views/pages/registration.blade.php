@extends('layouts.layout')

@section('content')

<div>
    <h1>{{Lang::get('strings.registration')}}</h1>

    @foreach ($errors->all() as $message)
        <br>
        {{$message}}
    @endforeach

    <div class = 'form-wrap'>

        @if(isset($user))
            {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT', 'data-toggle' => 'validator')) }}
        @else
            {{ Form::open(array('route' => array('user.store'), 'method' => 'post', 'data-toggle' => 'validator')) }}
        @endif

        <div class = 'form-group' id = 'group-name'>
            {{Form::label('name', Lang::get('strings.name'))}}*
            {{Form::text('name', null, array('class' => 'form-control', 'onchange' => 'checkForm(0,0)'))}}
            <span class="" aria-hidden="true"></span>          
            <p class="help-block">{{Lang::get('strings.valid_name')}}</p>
        </div>       

        <div class = 'form-group' id = 'group-email'>
            {{Form::label('email','Email')}}*
            {{Form::email('email', null, array('class' => 'form-control', 'onchange' => 'checkForm(1,0)'))}}
            <span class="" aria-hidden="true"></span> 
            <p class="help-block">{{Lang::get('strings.valid_email')}}</p>
        </div>

        <div class = 'form-group' id = 'group-phone'>
            {{Form::label('phone',Lang::get('strings.telephone'))}}*
            {{Form::text('phone', null, array('class' => 'form-control', 'onchange' => 'checkForm(2,0)'))}}
            <span class="" aria-hidden="true"></span> 
            <p class="help-block">{{Lang::get('strings.valid_phone')}}</p>
        </div>

     	<div class = 'form-group'>
            {{Form::label('address', Lang::get('strings.address'))}}
            {{Form::text('address', null, array('class' => 'form-control'))}}
        </div>

        <div class = 'form-group'>
            {{Form::label('location',Lang::get('strings.location'))}}
            {{Form::select('location', $locations, null, array('class' => 'form-control'))}}
        </div>

        <div class = 'form-group'>
            {{Form::label('entity_type',Lang::get('strings.entity_type'))}}
            {{Form::select('entity_type', $entity_types, null, array('class' => 'form-control'))}}
        </div>

        <div class = 'form-group'>
            {{Form::label('company_name',Lang::get('strings.company_name'))}}
            {{Form::text('company_name', null, array('class' => 'form-control'))}}
        </div>

        <div class = 'form-group' id = 'group-password'>
            {{Form::label('password', Lang::get('strings.password'))}}*
            {{Form::password('password', array('class' => 'form-control','onchange' => 'checkForm(3,0)'))}}
            <span class="" aria-hidden="true"></span> 
            <p class="help-block">{{Lang::get('strings.valid_password')}}</p>
        </div>

        <div class = 'form-group' id = 'group-password-confirmation'>
            {{Form::label('password_confirmation',Lang::get('strings.password_repeat'))}}*
            {{Form::password('password_confirmation', array('class' => 'form-control','onchange' => 'checkForm(4,0)'))}}
            <span class="" aria-hidden="true"></span> 
            <p class="help-block">{{Lang::get('strings.valid_password_confirmation')}}</p>
        </div>

        <div class = 'form-group'>
            {{Form::label('newsletter', 'Newsletter')}}
            {{Form::checkbox('newsletter', '1', array('class' => 'form-control'))}}
        </div>

        <div class = 'form-group'>
            {{Form::submit(Lang::get('strings.submit'), array('id' => 'submit', 'class' => 'form-control btn btn-primary'))}}
        </div>

        {{ Form::close() }}

    </div>
</div>

{{ HTML::style('css/bootstrap.css') }}

<script>
var submit = document.getElementById('submit');
var form = new Array(5);
/*var name = $("#name").val();
var email = $("#email").val();
var phone = $("#phone").val();*/
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function checkForm(element, init) {

    if(element == 0) {
        if($("#name").val().length < 2) {
            toggleState('name', 0);
            form[0] = 0;
        }
        else {
            toggleState('name', 1);
            form[0] = 1;
        }
    }

    if(element == 1) {
        if(!re.test($("#email").val())) {
            toggleState('email', 0);
            form[1] = 0;    
        }
        else {
            toggleState('email', 1);
            form[1] = 1;
        }
    }

    if(element == 2) {
        if(!/^\d+$/.test($("#phone").val()) || $("#phone").val().length < 9) {
            toggleState('phone', 0);
            form[2] = 0;
        }
        else {
            toggleState('phone', 1);
            form[2] = 1;
        }
    }

    if(element == 3 || element == 4) {
        if ($("#password").val().length < 6) {
            toggleState('password', 0);
            form[3] = 0;
        }
        else {
            toggleState('password', 1);
            form[3] = 1;
        }

        if ($("#password").val() != $("#password_confirmation").val()) {
            toggleState('password-confirmation', 0);
            form[4] = 0;
        }
        else {
            toggleState('password-confirmation', 1);
            form[4] = 1;
        }
    }

    if(init == 0) {
        validate();
    }

}

function toggleState(elem, op) {
    var element =  document.getElementById('group-' + elem);
    if(op) {
        element.className = "form-group has-success has-feedback";
        element.getElementsByClassName('help-block')[0].style.display = 'none';
        element.getElementsByTagName('span')[0].className = 'glyphicon glyphicon-ok form-control-feedback';
    }
    else {
        element.className = "form-group has-error has-feedback";
        element.getElementsByClassName('help-block')[0].style.display = 'block';
        element.getElementsByTagName('span')[0].className = 'glyphicon glyphicon-remove form-control-feedback';
    }
}

function validate () {
    for (i = 0; i<=4; i++) {
        if(form[i] == 0) {
            submit.disabled = true;
            return;
        }
    }
    submit.disabled = false;
}

$(document).ready(function () {
    form = [0, 0, 0, 0, 0];
    for (i = 0; i<=4; i++) {
        checkForm(i, 1);
    }
    validate();

});

</script>

@stop