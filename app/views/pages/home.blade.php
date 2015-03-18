@extends('layouts.layout')

@section('content')

<div class = 'home-sections'>
	<div class = 'three-columns'>
		<img src = 'images/test/1.png'>
		<img src = 'images/test/2.png'>
		<img src = 'images/test/3.png'>
	</div>
	<div class = 'section-select white'>
		<div class = 'inner'>
			<h1>MOBILIÁRIO</h1>
			<p>
				Mesas, Cadeiras, Bancos Altos, Mobiliário Piscina, Cadeiras de Bébé,
				Mobiliário com iluminação em Polipropileno
			</p>
		</div>
	</div>
</div>

<div class = 'home-sections'>
	<div class = 'section-select white inverse'>
		<div class = 'inner'>
			<h1>SOMBREAMENTO E PROTECÇÃO SOLAR</h1>
			<p>
				Estores exterior e interior, Toldos, Coberturas Tensionadas, Chapéus de Sol
			</p>
		</div>
	</div>
	<div class = 'three-columns'>
		<img src = 'images/test/4.png'>
		<img src = 'images/test/5.png'>
		<img src = 'images/test/6.png'>
	</div>
</div>

<div class = 'home-sections'>
	<div class = 'three-columns'>
		<img src = 'images/test/7.png'>
		<img src = 'images/test/8.png'>
		<img src = 'images/test/9.png'>
	</div>
	<div class = 'section-select white'>
		<div class = 'inner'>
			<h1>DIVERSOS</h1>
			<p>
				Tapetes de Alto Tráfeco, Pavimentos, Cofres, Louças, Secadores, Espelhos, Minibares,
				Lamparinas, Aquecedores e Ventilação de Esplanada
			</p>
		</div>
	</div>
</div>

<hr>

<div class = 'two-columns-top'>
	<div class = 'promotion'>
		<h3 class = 'red'>.PROMOÇÃO</h3>
		<img src = '/images/slideshow/1.png'>
	</div>
	<div class = 'new'>
		<h3 class = 'red'>.NOVIDADES</h3>
		<img src = '/images/slideshow/2.png'>
	</div>
</div>

<hr class = 'clear-fix'>

<div class = 'two-columns-bottom'>
	<div class = 'video'>
		<h3>.CANAL YOUTUBE</h3>
		<iframe 
			src="https://www.youtube.com/embed/I_ZX1ypXgaY?rel=0" frameborder="0" allowfullscreen>
		</iframe>
	</div>
	<div class = 'portfolio'>
		<h3>.PORTFOLIO</h3>
		<div id="slideshow">
			<ul class="bjqs">
				<li><a class = 'slide-img' href = '/images/slideshow/3.png'><img src="/images/slideshow/3.png"></a></li>
				<li><a class = 'slide-img' href = '/images/slideshow/2.png'><img src="/images/slideshow/2.png"></a></li>
				<li><a class = 'slide-img' href = '/images/slideshow/1.png'><img src="/images/slideshow/1.png"></a></li>
			</ul>
		</div>
	</div>
</div>


@stop