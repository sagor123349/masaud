@extends('frontend.master')
@section('content')

<div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
               <i class="fa fa-angle-left"></i>
                  <div class="container">
                     <h1 class="fashion_taital">Man & Woman Fashion</h1>
                     <div class="fashion_section_2">
                     <div class="row">

                     <button class="prev" onclick="prevSlide()">&#10094;</button>

                    <button class="next" onclick="nextSlide()">&#10095;</button>
                    
                     <div class="image">
                  
  @foreach($products as $product)
  <div class="soo" >
  <h4 class="shirt_text">{{$product->name}}</h4>
  <p class="price_text">Price  <span>$ {{$product->price}}</span></p> <!-- Assuming there's a 'price' column -->
  <div class="round">
  <img src="{{asset('uploads/products/'.$product->image) }}" height="100%" width="100%" alt="">
  </div>
  <div class="btn_main">
<div class="buy_bt"><a href="#">Buy Now</a></div>
<div class="seemore_bt"><a href="#">See More</a></div>
</div>
  </div>
 
@endforeach 

</div>
    


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
  <div class="long-area" >
   <a href="{{route('frontend.fashion.allproduct')}}"><button class="btn">show more</button></a>
  
    
    </button>
</div>
    @endsection                
    