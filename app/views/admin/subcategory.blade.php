@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de sub-categorias</h1>

<div class = 'filters'>
	{{ Form::open(array('url' => 'admin/subcategorias', 'method' => 'post', 'class' => 'form-inline')) }}
		<div class = 'form-group'>
			{{Form::label('category','Categoria')}}	
			{{Form::select('category', [null=>'Sem filtro']+$categories, Input::get('category'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
		</div>
    {{ Form::close() }}
</div>

<div class = 'novo'>
	<a href = 'subcategorias/criar'><button class="btn btn-primary">Novo</button></a>
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
				<th>Apagar</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($subcategories as $subCategory)
				<tr>
					<td><a href = 'subcategorias/{{ $subCategory->id }}'>{{ $subCategory->id }}</a></td>
					<td>{{ $subCategory->name }}</td>
					<td>{{ $categories[$subCategory->category] }}</td>
					<td>{{ $subCategory->ordering }}</td>
					<td>
						@if($subCategory->published == 1)
							<a href = 'subcategorias/unpublish/{{ $subCategory->id }}'><button class="btn btn-warning btn-sm">Despublicar</button></a>
						@else
							<a href = 'subcategorias/publish/{{ $subCategory->id }}'><button class="btn btn-success btn-sm">Publicar</button></a>
						@endif
					</td>
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.subcategory.destroy', $subCategory->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
			        	<td>{{Form::submit('Apagar',array('id' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}</td>
					{{ Form::close() }}
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop