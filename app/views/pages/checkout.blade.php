@extends('layouts.layout')

@section('content')

<div class = 'carts'>

	@foreach($cart as $item)
		Nome:{{$item->name}} <br>
		Quantidade:{{$item->quantity}} <br>
		Icon:{{$item->icon}} <br>
	@endforeach

</div>

@stop