@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>
    
<h1>Enviar newsletter</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::open(array('url' => 'admin/newsletter/send')) }}

<div class = 'form-group'>
    {{Form::label('description', 'Texto')}}
    {{Form::textarea('description', null, array('class' => 'form-control'))}}
</div>

<div class = 'form-group'>
    {{Form::submit('Enviar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
</div>

{{ Form::close() }}

<a href = '/admin'><button class="btn btn-warning">Cancelar</button></a>

</div>

<script>
    CKEDITOR.replace('description');
</script>

@stop