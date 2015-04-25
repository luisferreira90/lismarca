@extends('layouts.layout')

@section('content')

<h1>Listagem de produtos nesta página</h1>

<div class="gallery-list more-items">
    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/1.jpg" alt=""></a></div>
        <h3>.Title</h3>         
    </div>
 
    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/2.jpg" alt=""></a></div>
        <h3>.Title</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/3.jpg" alt=""></a></div>
        <h3>.Title</h3>       
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/4.jpg" alt=""></a></div>
        <h3>.Title</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/5.jpg" alt=""></a></div>
        <h3>.Title</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/6.jpg" alt=""></a></div>
        <h3>.Title</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/7.jpg" alt=""></a></div>
        <h3>.Title</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/8.jpg" alt=""></a></div>
        <h3>.Title</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/9.jpg" alt=""></a></div>
        <h3>.Title</h3>        
    </div>
</div>

<hr>

<div class="slideshow">
    <div>
        <img src="/images/home/1.jpg">
        <p>Nome</p>
    </div>
    <div>
        <img src="/images/home/2.jpg">
        <p>Nome</p>
    </div>
    <div>
        <img src="/images/home/3.jpg">
        <p>Nome</p>
    </div>
    <div>
        <img src="/images/home/4.jpg">
        <p>Nome</p>
    </div>
    <div>
        <img src="/images/home/5.jpg">
        <p>Nome</p>
    </div>
    <div>
        <img src="/images/home/6.jpg">
        <p>Nome</p>
    </div>
    <div>
        <img src="/images/home/7.jpg">
        <p>Nome</p>
    </div>
    <div>
        <img src="/images/home/8.jpg">
        <p>Nome</p>
    </div>
    <div>
        <img src="/images/home/9.jpg">
        <p>Nome</p>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="css/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script>

$(document).ready(function(){
  $('.slideshow').slick({
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 3
  });
});

</script>

{{ HTML::style('css/products.css') }}

@stop