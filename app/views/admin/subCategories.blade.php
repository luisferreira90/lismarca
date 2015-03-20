@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de sub-categorias</h1>

<div>
	{{ Form::open(array('url' => 'admin/produtos/subcategorias', 'method' => 'post')) }}

		{{Form::label('category','Categoria')}}	
		{{Form::select('category', [null=>'Sem filtro']+$categories, Input::get('category'), array('onchange' => 'this.form.submit()'))}}

    {{ Form::close() }}
</div>

<a href = 'subcategorias/criar'>Criar nova sub-categoria</a>

<div id = 'wrapper'>
	<table id = 'keywords'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Categoria</span></th>
				<th><span>Publicado</span></th>
				<th><span>Ordem</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($subcategories as $subCategory)
				<tr>
					<td><a href = 'subcategorias/{{ $subCategory->id }}'>{{ $subCategory->id }}</a></td>
					<td>{{ $subCategory->name }}</td>
					<td>{{ $categories[$subCategory->category] }}</td>
					<td>{{ $subCategory->published }}</td>
					<td>{{ $subCategory->ordering }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop