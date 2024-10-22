<?php

namespace App\Http\Controllers;
use App\Models\Product;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(){
      $products = Product::orderBy('created_at','DESC')->get();
return view('products.list',[
  'products' => $products
]);
    }

    public function create(){
  return view('products.create');
    }

    public function all(){
      $products = DB::table('products')->get();
      $products = Product::orderBy('id', 'desc')->get();

      return view('frontend.fashion.allproduct' , ['products' => $products]);
        }  


public function store(Request $request){
 $rules = [
  'name' => 'required|min:4',
  'sku' => 'required|min:3',
  'price' => 'required|numeric',
 ];
 $validator = Validator::make($request->all(),$rules);
 if($validator->fails()){
  return redirect()->route('products.create')->withInput()->withErrors($validator);
 }

$product = new Product();
$product-> name = $request->name;
$product-> sku = $request->sku;
$product-> price = $request->price;

$product-> description = $request->description;
$product->save();

if($request->hasFile('image')) {

      $image = $request->file('image');
      $ext = $image->getClientOriginalExtension();
      $imageName = time().'.'.$ext;

      // Move the uploaded image to the 'uploads/products' directory
      $image->move(public_path('uploads/products'), $imageName);

      // Save the image name to the database
      $product->image = $imageName;
      $product->save();
      
  } 


return redirect()->route('products.index')->with('success','Product added successfully');
}
    
    public function edit($id){
      $product = Product::findOrFail($id);
return view('products.edit',[
  'product' => $product
]);

    }

    //update
    public function update($id ,Request $request){
      $product = Product::findOrFail($id);

      // Validation rules
      $rules = [
          'name' => 'required|min:4',
          'sku' => 'required|min:3',
          'price' => 'required|numeric',
          'description' => 'nullable',  // Add this to avoid errors if no description is provided
          'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image type and size
      ];
      if ($request->hasFile('image')) {
        $rules['image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048'; // Add mime types and max size for better validation
    }
      $validator = Validator::make($request->all(), $rules);
      
      // If validation fails, return with errors
      if ($validator->fails()) {
          return redirect()->route('products.edit', $id)->withInput()->withErrors($validator); // 'products.edit' route should be used instead of 'products.create'
      }
      
      // Update product details
      $product->name = $request->name;
      $product->sku = $request->sku;
      $product->price = $request->price;
      $product->description = $request->description;
      $product->save();
      
      // Handle image upload
      if ($request->hasFile('image')) {
          // Check if the product already has an image and delete it if it exists
      
              File::delete(public_path('uploads/products/' . $product->image));
       
          // Store the new image
          $image = $request->file('image');
          $ext = $image->getClientOriginalExtension();
          $imageName = time() . '.' . $ext;
      
          // Move the uploaded image to the 'uploads/products' directory
          $image->move(public_path('uploads/products'), $imageName);
      
          // Save the new image name to the database
          $product->image = $imageName;
          $product->save();
      }
      
      // Redirect to products list with success message
      return redirect()->route('products.index')->with('success', 'Product updated successfully!');
      
      

    }

    //this method will delete a product
    public function destroy($id){
      $product = Product::findOrFail($id);
      File::delete(public_path('uploads/products/' . $product->image));

      //delete product from database
      $product->delete();

    // Redirect to products list with success message
    return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
      



    }
    
}
