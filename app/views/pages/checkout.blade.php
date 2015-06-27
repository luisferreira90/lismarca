{{ HTML::style('css/slick.css') }}
{{ HTML::style('css/slick-theme.css') }}
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/products.css') }}

@extends('layouts.layout')

@section('content')

<div class = 'carts'>

	<table class = 'table table-striped'>
		<thead>
			<tr>
				<th></th>
				<th>Nome</th>
				<th>Quantidade</th>
			</tr>
		</thead>
		<tbody>
			{{Form::open(array('action' => 'CartsController@submit'))}}
			@foreach($cart as $product)
				<tr>
					<td>
						<a href={{'/produtos/' . $product->id }}>{{ HTML::image('images/produtos/icons/' . $product->icon) }}</a>
					</td>
					<td>
						{{$product->name}}
					</td>
					<td>
						{{Form::number('quantity[]', $product->quantity, array('min' => '1', 'required' => 'true'))}}
						<br>
						<a href = 'checkout/delete/{{$product->id}}'>Eliminar</a>
					</td>
				</tr>
			@endforeach

	</tbody>
	</table>

	<div class = 'form-group'>
			{{Form::submit(Lang::get('strings.submit'), array('id' => 'submit', 'class' => 'form-control btn btn-primary'))}}
	</div>
	{{ Form::close() }}
</div>

@stop
