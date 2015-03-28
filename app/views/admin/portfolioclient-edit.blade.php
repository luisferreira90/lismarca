@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>
    
<h1>Editar Item</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

@if(isset($client))
    {{ Form::model($client, array('route' => array('admin.portfolioclient.update', $client->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}
@else
    {{ Form::open(array('route' => array('admin.portfolioclient.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}
@endif

    <div class = 'form-group'>
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('category','Categoria')}}
        {{Form::select('category', $categories, null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('info', 'Informação')}}
        {{Form::text('info', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('description', 'Descrição')}}
        {{Form::textarea('description', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('ordering', 'Ordem')}}
        {{Form::text('ordering', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('icon', 'Ícone')}}
        {{Form::file('icon', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    @if(isset($client))

        {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.portfolioclient.destroy', $client->id), 'onsubmit' => 'return ConfirmDelete()')) }}
            
            <div class = 'form-group'>
                {{Form::submit('Apagar cliente',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
            </div>

        {{ Form::close() }}

    @endif

    <a href = '/admin/portfolio-cliente'><button class="btn btn-warning">Cancelar</button></a>

</div>

<script>
    CKEDITOR.replace('description');
</script>

@if(isset($client))

    <div class = 'form-icon'>

        <h2>Icone</h2>

        {{ HTML::image($client->icon) }}

    </div>

@endif

@stop