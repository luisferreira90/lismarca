@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>

  <h1>Visualizar encomenda</h1>

  @foreach ($errors->all() as $message)
      <br>
      {{$message}}
  @endforeach

  {{ Form::model($order[0], array('route' => array('admin.order.update', $order[0]->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}

  <div class = 'form-group'>
      {{Form::label('name', 'Nome')}}
      {{Form::text('name', null, array('class' => 'form-control', 'disabled'))}}
  </div>    

  <div class = 'form-group'>
      {{Form::label('company_name', 'Empresa')}}
      {{Form::text('company_name', null, array('class' => 'form-control', 'disabled'))}}
  </div>

  <div class = 'form-group'>
      {{Form::label('email', 'Email')}}
      {{Form::text('email', null, array('class' => 'form-control', 'disabled'))}}
  </div>

  <div class = 'form-group'>
      {{Form::label('phone', 'Telefone')}}
      {{Form::text('phone', null, array('class' => 'form-control', 'disabled'))}}
  </div>

  <div class = 'form-group'>
      {{Form::label('address', 'Morada')}}
      {{Form::text('address', null, array('class' => 'form-control', 'disabled'))}}
  </div>

  <div class = 'form-group'>
      {{Form::label('datetime', 'Data')}}
      {{Form::text('datetime', null, array('class' => 'form-control', 'disabled'))}}
  </div>

  <div class = 'form-group'>
      {{Form::submit('Marcar como tratada',array('id' => 'submit', 'class' => 'btn btn-success'))}}
  </div>

  {{ Form::close() }}

</div>

@stop