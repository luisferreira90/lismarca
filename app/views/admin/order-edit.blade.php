@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>

  <h1>Visualizar encomenda</h1>

  @foreach ($errors->all() as $message)
      <br>
      {{$message}}
  @endforeach

  {{ Form::model($order, array('route' => array('admin.orders.update', $order->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}

  <div class = 'form-group'>
      {{Form::label('name', 'Nome')}}
      {{Form::text('name', null, array('class' => 'form-control'))}}
  </div>    

  <div class = 'form-group'>
      {{Form::label('company_name', 'Empresa')}}
      {{Form::text('company_name', null, array('class' => 'form-control'))}}
  </div>

  <div class = 'form-group'>
      {{Form::label('email', 'Email')}}
      {{Form::text('email', null, array('class' => 'form-control'))}}
  </div>

  <div class = 'form-group'>
      {{Form::label('phone', 'Telefone')}}
      {{Form::text('phone', null, array('class' => 'form-control'))}}
  </div>

  <div class = 'form-group'>
      {{Form::label('address', 'Morada')}}
      {{Form::text('address', null, array('class' => 'form-control'))}}
  </div>

  <div class = 'form-group'>
      {{Form::label('datetime', 'Data')}}
      {{Form::text('datetime', null, array('class' => 'form-control'))}}
  </div>

  <div class = 'form-group'>
      {{Form::label('treated', 'Tratada')}}
      {{Form::text('treated', null, array('class' => 'form-control'))}}
  </div>

  {{ Form::close() }}

</div>

@stop