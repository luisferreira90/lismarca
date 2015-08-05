@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>

  <h1>Visualizar encomenda</h1>

  @foreach ($errors->all() as $message)
      <br>
      {{$message}}
  @endforeach

  <table id = 'keywords' class = 'table table-hover'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Quantidade</th>
      </tr>
    </thead>
    @foreach ($products as $product)
        <tr>
          <td><a href = '/admin/items/{{$product->product_item}}'>{{$product->product_item}}</a></td>
          <td>{{$product->quantity}}</td>
        </tr>
    @endforeach

  </table>

  {{ Form::model($order[0], array('route' => array('admin.order.update', $order[0]->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}

  <a href = '/admin/utilizadores/{{$order[0]->user_id}}'>Ir para a página do utilizador</a><br><br>
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

  @if(!$order[0]->treated)
  <div class = 'form-group'>

      {{Form::submit('Marcar como tratada',array('id' => 'submit', 'class' => 'btn btn-success'))}}
  </div>
  @endif

  {{ Form::close() }}

  <br>

</div>

@stop