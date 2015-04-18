@extends('layouts.layout')

@section('content')

<h1>Listagem de produtos nesta página</h1>

<div class="products">
    <div class="galleryItem">
        <a href="produtos/categoria"><img src="/images/home/1.jpg" alt=""></a>
        <h3>.Title</h3>         
    </div>
 
    <div class="galleryItem">
        <a href="produtos/categoria"><img src="/images/home/2.jpg" alt=""></a>
        <h3>.Title</h3>        
    </div>

    <div class="galleryItem">
        <a href="produtos/categoria"><img src="/images/home/3.jpg" alt=""></a>
        <h3>.Title</h3>       
    </div>

    <div class="galleryItem">
        <a href="produtos/categoria"><img src="/images/home/4.jpg" alt=""></a>
        <h3>.Title</h3>        
    </div>

    <div class="galleryItem">
        <a href="produtos/categoria"><img src="/images/home/5.jpg" alt=""></a>
        <h3>.Title</h3>        
    </div>

    <div class="galleryItem">
        <a href="produtos/categoria"><img src="/images/home/6.jpg" alt=""></a>
        <h3>.Title</h3>        
    </div>

    <div class="galleryItem">
        <a href="produtos/categoria"><img src="/images/home/7.jpg" alt=""></a>
        <h3>.Title</h3>        
    </div>

    <div class="galleryItem">
        <a href="produtos/categoria"><img src="/images/home/8.jpg" alt=""></a>
        <h3>.Title</h3>        
    </div>

    <div class="galleryItem">
        <a href="produtos/categoria"><img src="/images/home/9.jpg" alt=""></a>
        <h3>.Title</h3>        
    </div>
</div>

<hr>

{{ HTML::style('css/products.css') }}

@stop