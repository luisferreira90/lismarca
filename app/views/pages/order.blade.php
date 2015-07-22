<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style>table,table a:link{color:#666}table a:link,table a:visited{font-weight:700;text-decoration:none}table a:visited{color:#999}table a:active,table a:hover{color:#bd5a35;text-decoration:underline}table{font-family:Arial,Helvetica,sans-serif;font-size:12px;text-shadow:1px 1px 0 #fff;background:#eaebec;margin:20px;border:1px solid #ccc;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;-moz-box-shadow:0 1px 2px #d1d1d1;-webkit-box-shadow:0 1px 2px #d1d1d1;box-shadow:0 1px 2px #d1d1d1}table td,table th{border-bottom:1px solid #e0e0e0}table th{padding:21px 25px 22px;border-top:1px solid #fafafa;background:#ededed;background:-webkit-gradient(linear,left top,left bottom,from(#ededed),to(#ebebeb));background:-moz-linear-gradient(top,#ededed,#ebebeb)}table th:first-child{text-align:left;padding-left:20px}table tr:first-child th:first-child{-moz-border-radius-topleft:3px;-webkit-border-top-left-radius:3px;border-top-left-radius:3px}table tr:first-child th:last-child{-moz-border-radius-topright:3px;-webkit-border-top-right-radius:3px;border-top-right-radius:3px}table tr{text-align:center;padding-left:20px}table td:first-child{text-align:left;padding-left:20px;border-left:0}table td{padding:18px;border-top:1px solid #fff;border-left:1px solid #e0e0e0;background:#fafafa;background:-webkit-gradient(linear,left top,left bottom,from(#fbfbfb),to(#fafafa));background:-moz-linear-gradient(top,#fbfbfb,#fafafa)}table tr.even td{background:#f6f6f6;background:-webkit-gradient(linear,left top,left bottom,from(#f8f8f8),to(#f6f6f6));background:-moz-linear-gradient(top,#f8f8f8,#f6f6f6)}table tr:last-child td{border-bottom:0}table tr:last-child td:first-child{-moz-border-radius-bottomleft:3px;-webkit-border-bottom-left-radius:3px;border-bottom-left-radius:3px}table tr:last-child td:last-child{-moz-border-radius-bottomright:3px;-webkit-border-bottom-right-radius:3px;border-bottom-right-radius:3px}table tr:hover td{background:#f2f2f2;background:-webkit-gradient(linear,left top,left bottom,from(#f2f2f2),to(#f0f0f0));background:-moz-linear-gradient(top,#f2f2f2,#f0f0f0)}</style>
	</head>
	<body>
		<h1>Pedido de orçamento</h1>

		<p>No dia {{date('d/m/Y', time())}}, o cliente nº <strong>{{Auth::user()->id}} - {{Auth::user()->name}}</strong> fez o 
			seguinte pedido de orçamento:
		</p>
		
		<table>
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

		<h3>Dados do cliente</h3>
		<p>Nome: {{Auth::user()->name}}</p>
		<p>Email: {{Auth::user()->email}}</p>
		<p>Telefone: {{Auth::user()->phone}}</p>
		<p>Address: {{Auth::user()->address}}</p>
		<p>Nome da empresa: {{Auth::user()->company_name}}</p>

	</body>
</html>
