@extends('backend.master')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
   
    <link rel="stylesheet" href="{{asset('css/adminlte.css')}}"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

</head>

<body>
<main class="app-main">
<div class="container">
    <div class="wrapper">
        <section class="form signup">
            <header>Edit Product</header>
            <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
            @method('put') 
                @csrf
                <div class="error-text"></div>
                <div class="field input">
                        <label>Product Name</label>
                        <input value="{{$product->name}}" type="text" name="name" placeholder="Enter your Product Name" required>
                    </div>

                    <div class="field input">
                        <label>SKU</label>
                        <input value="{{$product->sku}}" type="text" name="sku" placeholder="Enter your sku">
                    </div>
                    <div class="field input">
                        <label>Price</label>
                        <input value="{{$product->price}}" type="text" name="price" placeholder="Enter your price" required>
                        <i class="fas fa-eye"></i>
                    </div>

                    <div class="field input">
                        <label>Description</label>
                        <textarea name="description"  placeholder="Write a description" cols="30" rows="3">{{$product->description}}</textarea>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Select Image</label>
                        <input type="File" name="image">
                        @if (!empty($product->image))
        <img class="w-50 my-3" src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image">
    @endif
                    </div>
                    <div class="field button">
                        <input type="submit" value="Update">
                        
                    </div>

               
            </form>
            
        </section>
    </div>
    </div>
    @endsection

</body>
</html>


