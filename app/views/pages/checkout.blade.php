@extends('layouts.layout')

@section('content')

<div class = 'carts'>

	@foreach($cart as $item)
	<div class = ''>
		Id:{{$item->product_item}} <br>
		Nome:{{$item->name}} <br>
		Quantidade:{{$item->quantity}} <br>
		Icon:{{$item->icon}} <br>
	</div>
	<br><br>
	@endforeach

</div>

@stop