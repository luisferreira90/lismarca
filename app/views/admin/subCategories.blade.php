@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de sub-categorias</h1>

<div>
	{{ Form::open(array('url' => 'admin/produtos/subcategorias', 'method' => 'post', 'class' => 'form-inline')) }}
		<div class = 'form-group'>
			{{Form::label('category','Categoria')}}	
			{{Form::select('category', [null=>'Sem filtro']+$categories, Input::get('category'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
		</div>
    {{ Form::close() }}
</div>

<a href = 'subcategorias/criar'><button class="btn btn-primary">Novo</button></a>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Categoria</span></th>
				<th><span>Publicado</span></th>
				<th><span>Ordem</span></th>
				<th>Apagar</th>
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
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.subcategory.destroy', $subCategory->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
			        	<td>{{Form::submit('Apagar',array('id' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}</td>
					{{ Form::close() }}
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<script>

  function ConfirmDelete() {
      var x = confirm("Tem a certeza que deseja apagar a categoria?");
      if (x)
        return true;
      else
        return false;
  }

</script>

@stop