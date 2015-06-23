{{ HTML::style('css/slick.css') }}
{{ HTML::style('css/slick-theme.css') }}
{{ HTML::style('css/products.css') }}

@extends('layouts.layout')

@section('content')

<a href = 'produtos'>
	<section class = 'home-sections'>
		<div class = 'three-columns'>
			<div>
				<img class="bottom" src="/images/home/1t.jpg" />
		  		<img class="top" src="/images/home/1.jpg" />
		  	</div>
		  	<div>
				<img class="bottom" src="/images/home/2t.jpg" />
		  		<img class="top" src="/images/home/2.jpg" />
		  	</div>
		  	<div>
				<img class="bottom" src="/images/home/3t.jpg" />
		  		<img class="top" src="/images/home/3.jpg" />
		  	</div>
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
	</section>
</a>

<a href = 'produtos'>
	<section class = 'home-sections'>
		<div class = 'three-columns'>
			<div>
				<img class="bottom" src="/images/home/4t.jpg" />
		  		<img class="top" src="/images/home/4.jpg" />
		  	</div>
		  	<div>
				<img class="bottom" src="/images/home/5t.jpg" />
		  		<img class="top" src="/images/home/5.jpg" />
		  	</div>
		  	<div>
				<img class="bottom" src="/images/home/6t.jpg" />
		  		<img class="top" src="/images/home/6.jpg" />
		  	</div>
		</div>
		<div class = 'section-select white'>
			<div class = 'inner'>
				<h1>SOMBREAMENTO E PROTECÇÃO SOLAR</h1>
				<p>
					Estores exterior e interior, Toldos, Coberturas Tensionadas, Chapéus de Sol
				</p>
			</div>
		</div>
	</section>
</a>

<a href = 'produtos'>
	<section class = 'home-sections'>
		<div class = 'three-columns'>
			<div>
				<img class="bottom" src="/images/home/7t.jpg" />
		  		<img class="top" src="/images/home/7.jpg" />
		  	</div>
		  	<div>
				<img class="bottom" src="/images/home/8t.jpg" />
		  		<img class="top" src="/images/home/8.jpg" />
		  	</div>
		  	<div>
				<img class="bottom" src="/images/home/9t.jpg" />
		  		<img class="top" src="/images/home/9.jpg" />
		  	</div>
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
	</section>
</a>

<hr>

<h2 class = 'red'>Em destaque</h2>
<div class="slideshow">
@foreach ($featured as $featureditem)
    <div>
        <div class = 'slideshow-image'><a href = '/produtos/{{$featureditem->id}}'><img src="/images/produtos/items/thumbnails/{{$featureditem->icon}}"></a></div>
        <p>{{$featureditem->name}}</p>
    </div>
@endforeach
</div>

<hr>

<h2 class = 'red'>Novidades</h2>
<div class="slideshow">
@foreach ($new as $newitem)
    <div>
        <div class = 'slideshow-image'><a href = '/produtos/{{$newitem->id}}'><img src="/images/produtos/items/thumbnails/{{$newitem->icon}}"></a></div>
        <p>{{$newitem->name}}</p>
    </div>
@endforeach
</div>

<!--
<div class = 'two-columns'>
	<a href = 'produtos'>
		<div class = 'promotion'>
			<h3 class = 'red'>.PROMOÇÃO</h3>
			<img src = '/images/slideshow/1.png'>
		</div>
	</a>
	<a href = 'produtos'>
		<div class = 'new'>
			<h3 class = 'red'>.NOVIDADES</h3>
			<img src = '/images/slideshow/2.png'>
		</div>
	</a>
</div>

<hr class = 'clear-fix'>

<div class = 'two-columns'>
	<div class = 'video'>
		<h4 class = 'grey'>.CANAL YOUTUBE</h4>
		<iframe 
			src="https://www.youtube.com/embed/I_ZX1ypXgaY?rel=0&amp;showinfo=0" 
			frameborder="0" allowfullscreen>
		</iframe>
	</div>
	<a href = 'portfolio'>
		<div class = 'portfolio'>
			<h4 class = 'grey'>.PORTFOLIO</h4>
			<img src="/images/slideshow/3.png">
		</div>
	</a>
</div>
-->
<hr class = 'clear-fix'>
<div class = 'location'>
	<p class = 'red title-smaller'>.LOCALIZAÇÃO</p>
	<img src="/images/location.svg">
	<p class = 'dark-grey'>Rua Mestre Sidónio 9A, 9020-365 Funchal, Madeira | Portugal</p>
</div>

{{ HTML::script('js/slick.min.js') }}
<script>

$(document).ready(function(){
  $('.slideshow').slick({
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
    {
      breakpoint: 1080,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
  });
});

</script>

@stop