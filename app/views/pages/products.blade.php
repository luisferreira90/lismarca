@extends('layouts.layout')

@section('content')

<h1>Produtos</h1>

<section class = 'products'>
	<div class = 'three-columns'>
		<div>
			<a href = '#1'>
				<img class="bottom" src="/images/home/1t.jpg" />
				<img class="top" src="/images/home/1.jpg" />
			</a>
		</div>
		<div>
			<a href = '#2'>
				<img class="bottom" src="/images/home/2t.jpg" />
				<img class="top" src="/images/home/2.jpg" />
			</a>
		</div>
		<div>
			<a href = '#3'>
				<img class="bottom" src="/images/home/3t.jpg" />
				<img class="top" src="/images/home/3.jpg" />
			</a>
		</div>
	</div>

	<div class = 'three-columns'>
		<div>
			<a href = '#4'>
				<img class="bottom" src="/images/home/4t.jpg" />
				<img class="top" src="/images/home/4.jpg" />
			</a>
		</div>
		<div>
			<a href = '#5'>
				<img class="bottom" src="/images/home/5t.jpg" />
				<img class="top" src="/images/home/5.jpg" />
			</a>
		</div>
		<div>
			<a href = '#6'>
				<img class="bottom" src="/images/home/6t.jpg" />
				<img class="top" src="/images/home/6.jpg" />
			</a>
		</div>
	</div>

	<div class = 'three-columns'>
		<div>
			<a href = '#7'>
				<img class="bottom" src="/images/home/7t.jpg" />
				<img class="top" src="/images/home/7.jpg" />
			</a>
		</div>
		<div>
			<a href = '#8'>
				<img class="bottom" src="/images/home/8t.jpg" />
				<img class="top" src="/images/home/8.jpg" />
			</a>
		</div>
		<div>
			<a href = '#9'>
				<img class="bottom" src="/images/home/9t.jpg" />
				<img class="top" src="/images/home/9.jpg" />
			</a>
		</div>
	</div>
</section>

{{ HTML::style('css/products.css') }}

@stop