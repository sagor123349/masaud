<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/admin', [HomeController::class, 'admin'])->name('index');



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to homepage after logout
})->name('logout');

Route::get('/', [HomeController::class, 'fashion'])->name('frontend.fashion');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/dashboard', [HomeController::class, 'Dash'])->middleware(['auth', 'verified'])->name('dashboard');

//fasion
Route::get('/fashion', [HomeController::class, 'fashion'])->name('frontend.fashion');
Route::get('/fashion/allproduct', [ProductController::class, 'all'])->name('frontend.fashion.allproduct');
//post
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
//edit
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
//update
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
//delete
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
