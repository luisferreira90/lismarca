@extends('admin.layouts.layout')

@section('content')

<h1>Encomendas</h1>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>Número</span></th>
				<th><span>Cliente</span></th>
				<th><span>Empresa</span></th>
				<th><span>Data</span></th>
				<th><span>Tratada</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td><a href = 'encomendas/{{ $order->id }}'>{{ $order->id }}</a></td>
					<td>{{ $order->name }}</td>
					<td>{{ $order->company_name }}</td>
					<td>{{ $order->datetime }}</td>
					<td>{{ $order->treated }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop