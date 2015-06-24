@extends('layouts.layout')

@section('content')

<div class = 'carts'>

	@foreach($item as $items)
		{{$items->name}}
	@endforeach

</div>

@stop