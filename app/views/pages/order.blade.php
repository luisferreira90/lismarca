<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Pedido de orçamento</h1>

		<p>No dia {{date('d/m/Y h:i:s a', time())}}, o cliente x fez o seguinte pedido de orçamento:</p>
		
		<table class = 'table table-striped'>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Quantidade</th>
			</tr>
		</thead>
		<tbody>
			{{Form::open(array('action' => 'CartsController@submit'))}}
			@foreach($cart as $product)
				<tr>
					<td>
						<a href = 'www.lismarca.pt/produtos/{{$product->product_item}}'>{{$product->product_item}}</a>
					</td>
					<td>
						{{$product->name}}
					</td>
					<td>
						{{$product->quantity}}
					</td>
				</tr>
			@endforeach
		</tbody>
		</table>

	</body>
</html>
