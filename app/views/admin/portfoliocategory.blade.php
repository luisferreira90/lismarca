@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de categorias de portfólio</h1>

<div class = 'novo'>
	<a href = 'portfolio-categoria/criar'><button class="btn btn-primary">Novo</button></a>
</div>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Ordem</span></th>
				<th><span>Publicar</span></th>
				<th><span>Apagar</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $category)
				<tr>
					<td><a href = 'portfolio-categoria/{{ $category->id }}'>{{ $category->id }}</a></td>
					<td>{{ $category->name }}</td>
					<td>{{ $category->ordering }}</td>
					<td>
						@if($category->published == 1)
							<a href = 'portfolio-categoria/unpublish/{{ $category->id }}'><button class="btn btn-warning btn-sm">Despublicar</button></a>
						@else
							<a href = 'portfolio-categoria/publish/{{ $category->id }}'><button class="btn btn-success btn-sm">Publicar</button></a>
						@endif
					</td>
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.portfoliocategory.destroy', $category->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
			        	<td>{{Form::submit('Apagar',array('id' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}</td>
					{{ Form::close() }}
				</tr>
			@endforeach
		</tbody>
	</table>

</div>

@stop