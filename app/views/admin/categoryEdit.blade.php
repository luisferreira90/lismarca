@extends('admin.layouts.layout')

@section('content')

<h1>Editar Sub-secção</h1>

<div class = 'form-wrap'>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::model($category, array('route' => array('admin.category.update', $category->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}

    <div class = 'form-group'>
            {{Form::label('name', 'Nome')}}
            {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('subsection','Sub-Secção')}}
            {{Form::select('subsection', $subsections, null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('icon','Ícone')}}
            {{Form::file('icon', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.category.destroy', $category->id), 'onsubmit' => 'return ConfirmDelete()')) }}
        
        <div class = 'form-group'>
            {{Form::submit('Apagar categoria',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
        </div>

    {{ Form::close() }}

</div>

<script>

  function ConfirmDelete() {
      var x = confirm("Tem a certeza que deseja apagar esta categoria?");
      if (x)
        return true;
      else
        return false;
  }

</script>

@stop