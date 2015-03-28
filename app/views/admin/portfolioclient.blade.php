@extends('admin.layouts.layout')

@section('content')

<h1>Portfólio - Clientes</h1>

<div class = 'filters'>
	{{ Form::open(array('url' => 'admin/portfolio-cliente', 'method' => 'get', 'class' => 'form-inline')) }}
		<div class = 'form-group'>
			{{Form::label('category','Categoria')}}	
			{{Form::select('category', [null=>'Sem filtro']+$category, Input::get('category'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
		</div>
    {{ Form::close() }}
</div>

<div class = 'novo'>
	<a href = 'portfolio-cliente/criar'><button class="btn btn-primary">Novo</button></a>
</div>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Categoria</span></th>
				<th><span>Ordem</span></th>
				<th><span>Publicar</span></th>
				<th><span>Apagar</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($clients as $client)
				<tr>
					<td><a href = 'portfolio-cliente/{{ $client->id }}'>{{ $client->id }}</a></td>
					<td>{{ $client->name }}</td>
					<td>{{ $category[$client->category] }}</td>
					<td>{{ $client->ordering }}</td>
					<td>
						@if($client->published == 1)
							<a href = 'portfolio-cliente/unpublish/{{ $client->id }}'><button class="btn btn-warning btn-sm">Despublicar</button></a>
						@else
							<a href = 'portfolio-cliente/publish/{{ $client->id }}'><button class="btn btn-success btn-sm">Publicar</button></a>
						@endif
					</td>
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.portfolioclient.destroy', $client->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
			        	<td>{{Form::submit('Apagar',array('id' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}</td>
					{{ Form::close() }}
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $clients->appends(Input::except('page'))->links() }}

</div>

@stop