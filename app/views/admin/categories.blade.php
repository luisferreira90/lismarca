@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de categorias</h1>

<div class = 'filters'>
	{{ Form::open(array('url' => 'admin/categorias', 'method' => 'post', 'class' => 'form-inline')) }}
		<div class = 'form-group'>
			{{Form::label('subsection','Sub-Secção')}}	
			{{Form::select('subsection', [null=>'Sem filtro']+$subsection, Input::get('subsection'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
		</div>
    {{ Form::close() }}
</div>

<div class = 'novo'>
	<a href = 'categorias/criar'><button class="btn btn-primary">Novo</button></a>
</div>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Sub-Secção</span></th>
				<th><span>Ordem</span></th>
				<th><span>Publicar</span></th>
				<th>Apagar</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $category)
				<tr>
					<td><a href = 'categorias/{{ $category->id }}'>{{ $category->id }}</a></td>
					<td>{{ $category->name }}</td>
					<td>{{ $subsection[$category->subsection] }}</td>
					<td>{{ $category->ordering }}</td>
					<td>
						@if($category->published === 1)
							<a href = 'categorias/unpublish/{{ $category->id }}'><button class="btn btn-warning btn-sm">Despublicar</button></a>
						@else
							<a href = 'categorias/publish/{{ $category->id }}'><button class="btn btn-success btn-sm">Publicar</button></a>
						@endif
					</td>
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.category.destroy', $category->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
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