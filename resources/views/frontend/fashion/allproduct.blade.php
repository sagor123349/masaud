@extends('frontend.master')
@section('content')
<div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
               <i class="fa fa-angle-left"></i>
                  <div class="container">
<div class="row2">


<div class="image2">
@foreach($products as $product)

<div class="soo" >
<h4 class="shirt_text">{{$product->name}}</h4>
<p class="price_text">Price  <span>$ {{$product->price}}</span></p> <!-- Assuming there's a 'price' column -->
<div class="round">
  <img src="{{asset('uploads/products/'.$product->image) }}" height="100%" width="100%" alt="">
  </div>
  <div class="textbox">
                        <p>Description  <span>{{$product->description}}</span></p>
                        </div>
                      
</div>
@endforeach 
  </div>
    @endsection    