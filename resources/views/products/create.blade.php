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
            <header>ADD Product</header>
            <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="error-text"></div>
                <div class="field input">
                        <label>Product Name</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" placeholder="Enter your Product Name" >
                        @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field input">
                        <label>SKU</label>
                        <input class="@error('sku') is-invalid @enderror"  type="text" name="sku" placeholder="Enter your sku">
                        @error('sku')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field input">
                        <label>Price</label>
                        <input class="@error('price') is-invalid @enderror"  type="text" name="price" placeholder="Enter your price">
                        @error('price')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-eye"></i>
                    </div>

                    <div class="field input">
                        <label>Description</label>
                        <textarea name="description"  placeholder="Write a description" cols="30" rows="3"></textarea>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Select Image</label>
                        <input type="File" name="image">
                    </div>
                    <div class="field button">
                        <input type="submit" value="Submit">
                        
                    </div>

               
            </form>
            
        </section>
    </div>
    </div>
    @endsection

</body>
</html>


