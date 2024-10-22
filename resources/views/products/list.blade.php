@extends('backend.master')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="{{asset('css/adminlte.css')}}"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

</head>
<style>




tr {
    padding: 10px 15px; /* Padding around text */
    border: 1px solid #ccc; /* Border around each cell */
    text-align: center; /* Center-align text in each cell */
    background-color: #f9f9f9; /* Light background color */
    /* Text color */
    font-size: 16px; /* Font size */
    
    justify-content:center;
 
   
    
}

th {
    padding: 10px 15px; /* Padding around text */
    border: 1px solid #ccc; /* Border around each cell */
    text-align: center; /* Center-align text in each cell */
    background-color: #f9f9f9; /* Light background color */
    /* Text color */
    font-size: 16px; /* Font size */
    justify-content:center;  
 
}

td img{
  width: 60;
    object-fit:cover;
   
}

</style>
<body>
<main class="app-main">

   <div class="row d-flex justify-content-center">
@if(Session::has('success'))
   <div class="col-md-10 mt-4">
   <div class="alert alert-success">
   {{Session::get('success')}}
   </div>
   </div>
   @endif
   </div>
   <div class="card-body">
    <table class="table">
        <tr>
            <th>ID</th>
            <th></th>
            <th>Name</th>
            <th>Sku</th>
            <th>Price</th>
            <th>Created at</th>
            <th>Action</th>

        </tr>
        @if ($products->isNotEmpty())
        @foreach ( $products as $product )
           <tr>
            <td>{{ $product->id }}</td>
            <td>
                @if ($product->image != "")
                    <img  src="{{asset('uploads/products/'.$product->image) }}" alt="">
                @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->price }} BDT</td>
            <td>{{ \Carbon\Carbon::parse($product->created_at)->format('dM, Y') }}</td>
            <td>
                <a href="{{route('products.edit', $product->id)}}" class="btn btn-dark">Edit</a>

                <a href="#" onclick="deleteProduct({{ $product->id }})" class="btn btn-danger">Delete</a>

          <form id="delete-product-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
        </form>
            </td>

           </tr>
           @endforeach
           @endif
    </table>
   </div>
</div>
    @endsection

</body>
</html>

<script>
    function deleteProduct(productId) {
        if (confirm('Are you sure you want to delete this product?')) {
            document.getElementById('delete-product-form-' + productId).submit();
        }
    }
</script>

