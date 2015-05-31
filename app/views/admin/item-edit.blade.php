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
        {{Form::label('pdf', 'PDF')}}
        {{Form::file('pdf', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('icon', 'Ícone / Imagem de apresentação')}}
        {{Form::file('icon', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('images', 'Imagens')}}
        {{Form::file('images[]', ['multiple' => true], array('class' => 'form-control'))}}
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
        <a target="_blank" href = {{ URL::asset('/pdf/' . $item->id . '.pdf') }} ><img src = '/images/pdf.svg'></a>
    </div>

    <div class = 'form-icon'>

        <h3>Icone / Imagem de apresentação actual</h3>

        {{ HTML::image('/images/produtos/icons/' . $item->icon) }}

    </div>

    <div class = 'form-icon'>

        <h3>Fotos actuais</h3>

        @foreach ($photos as $photo)

             {{ Form::open(array('method' => 'delete', 'route' => array('admin.productphoto.destroy', $photo->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
                <button type = 'submit'>{{ HTML::image('/images/produtos/items/thumbnails/' . $photo->src) }}</button>
            {{ Form::close() }}

        @endforeach

    </div>

@endif

@stop