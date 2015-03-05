@extends('layouts.layout')

@section('content')

<div id="slideshow">
	<ul class="bjqs">
		<li><a class = 'slide-img' href = 'images/slideshow/3.jpg'><img src="images/slideshow/3.jpg"></a></li>
		<li><a class = 'slide-img' href = 'images/slideshow/2.jpg'><img src="images/slideshow/2.jpg"></a></li>
		<li><a class = 'slide-img' href = 'images/slideshow/1.jpg'><img src="images/slideshow/1.jpg"></a></li>
	</ul>
</div>

<img src = 'images/separator.jpg' class = 'separator'>

<div class = 'novidades'>
	<p class = 'title red'>.NOVIDADES</p>
	<div class = 'four-columns'>
		<div class = 'column'>
			<img class = 'product-image' src = 'images/test/exemplo1.png'>
			<div class = 'product-description'>
				<img src = 'images/arrow-small-right-red.png'>
				<p>Lis PowerUp 2500</p>
				<p class = 'see-more red'>...+</p>
			</div>
		</div>

		<div class = 'column'>
			<img class = 'product-image' src = 'images/test/exemplo2.png'>
			<div class = 'product-description'>
				<img src = 'images/arrow-small-right-red.png'>
				<p>Cadeira Trend</p>
				<p class = 'see-more red'>...+</p>
			</div>
		</div>

		<div class = 'column'>
			<img class = 'product-image' src = 'images/test/exemplo3.png'>
			<div class = 'product-description'>
				<img src = 'images/arrow-small-right-red.png'>
				<p>Cadeira Lisboa</p>
				<p class = 'see-more red'>...+</p>
			</div>
		</div>

		<div class = 'column'>
			<img class = 'product-image' src = 'images/test/exemplo2.png'>
			<div class = 'product-description'>
				<img src = 'images/arrow-small-right-red.png'>
				<p>Chapéu de Sol</p>
				<p class = 'see-more red'>...+</p>
			</div>
		</div>

		<div class = 'column'>
			<img class = 'product-image' src = 'images/test/exemplo2.png'>
			<div class = 'product-description'>
				<img src = 'images/arrow-small-right-red.png'>
				<p>Chapéu de Sol</p>
				<p class = 'see-more red'>...+</p>
			</div>
		</div>

		<div class = 'column'>
			<img class = 'product-image' src = 'images/test/exemplo2.png'>
			<div class = 'product-description'>
				<img src = 'images/arrow-small-right-red.png'>
				<p>Chapéu de Sol</p>
				<p class = 'see-more red'>...+</p>
			</div>
		</div>

		<div class = 'column'>
			<img class = 'product-image' src = 'images/test/exemplo2.png'>
			<div class = 'product-description'>
				<img src = 'images/arrow-small-right-red.png'>
				<p>Chapéu de Sol</p>
				<p class = 'see-more red'>...+</p>
			</div>
		</div>

		<div class = 'column'>
			<img class = 'product-image' src = 'images/test/exemplo2.png'>
			<div class = 'product-description'>
				<img src = 'images/arrow-small-right-red.png'>
				<p>Chapéu de Sol</p>
				<p class = 'see-more red'>...+</p>
			</div>
		</div>
	</div>
</div>

<img src = 'images/separator.jpg' class = 'separator'>

<div class = 'three-columns'>
	<div class = 'column'>
		<p class = 'title-smaller red'>.PROMOÇÃO</p>
		<img class = 'product-image' src = 'images/test/exemplo1.png'>
		<div class = 'product-description'>
			<img src = 'images/arrow-small-right-red.png'>
			<p>Lis PowerUp 2500 (Área de Alcance 22m)</p>
			<p class = 'see-more red'>...+</p>
		</div>
	</div>

	<div class = 'column middle'>
		<p class = 'title-smaller red'>.PORTFÓLIO</p>
		<img class = 'product-image' src = 'images/test/exemplo3.png'>
		<div class = 'product-description'>
			<img src = 'images/arrow-small-right-red.png'>
			<p>Lis PowerUp 2500 (Área de Alcance 22m)</p>
			<p class = 'see-more red'>...+</p>
		</div>
	</div>

	<div class = 'column'>
		<p class = 'title-smaller red'>.STOCK</p>
		<img class = 'product-image' src = 'images/test/exemplo2.png'>
		<div class = 'product-description'>
			<img src = 'images/arrow-small-right-red.png'>
			<p>Lis PowerUp 2500 (Área de Alcance 22m)</p>
			<p class = 'see-more red'>...+</p>
		</div>
	</div>
</div>

<div class = 'clear-fix'></div>

<div class = 'map'>
	<p class = 'title red'>.LOCALIZAÇÃO</p>
	<div id="map-canvas"></div>
</div>

@stop