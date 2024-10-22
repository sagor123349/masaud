<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
   public function logout(){
    return view('index');
   }

   public function admin(){
      return view('index');
     }

   public function Dash(){

      return view('dashboard');
     }
     public function fashion() {
    
      $products = DB::table('products')->orderBy('created_at', 'desc')->take(5)->get();
      return view('frontend.fashion', ['products' => $products]);
  }
}
