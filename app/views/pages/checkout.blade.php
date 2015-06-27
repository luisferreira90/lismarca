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
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cart as $product)
				<tr>
					<td>
						<a href={{'/produtos/' . $product->id }}>{{ HTML::image('images/produtos/icons/' . $product->icon) }}</a>
					</td>
					<td>
						{{$product->name}}
					</td>
					<td>
						{{$product->quantity}}
					</td>
					<td>
						Eliminar
					</td>
				</tr>
			@endforeach
	</tbody>
	</table>

</div>

@stop
