@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>
    
<h1>Editar Item</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

@if(isset($item))
    {{ Form::model($item, array('route' => array('admin.item.update', $item->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}
@else
    {{ Form::open(array('route' => array('admin.item.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}
@endif

    <div class = 'form-group'>
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('subcategory','Sub-Categoria')}}
        {{Form::select('subcategory', $subcategories, null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('description', 'Descrição')}}
        {{Form::textarea('description', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('new', 'Novidade')}}
        {{Form::checkbox('new', '1', array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('featured', 'Em destaque')}}
        {{Form::checkbox('featured', '1', array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('icon', 'Ícone')}}
        {{Form::file('icon', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    @if(isset($item))

        {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.item.destroy', $item->id), 'onsubmit' => 'return ConfirmDelete()')) }}
            
            <div class = 'form-group'>
                {{Form::submit('Apagar item',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
            </div>

        {{ Form::close() }}

    @endif

    <a href = '/admin/items'><button class="btn btn-warning">Cancelar</button></a>

</div>

<script>
    CKEDITOR.replace('description');
</script>

@if(isset($item))

    <div class = 'form-icon'>

        <h2>Icone</h2>

        {{ HTML::image($item->icon) }}

    </div>

@endif

@stop