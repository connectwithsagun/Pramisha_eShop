<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

use app\Models\Product;
use app\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function (App\Models\Category $category) {
//   //  $products = App\Models\Product::all();

//    $categories = App\Models\Category::all();
   
//      $categories_electronics = App\Models\Category::all()->where('name','electronics');
  
//      $categories_electronics = $category->categories_electronics;

//     return view('home', [ 'categories' => $categories, 'categories_electronics' => $categories_electronics] );

// });


Route::get('/', function () {
      $products = App\Models\Product::all();
      $categories = App\Models\Category::all();

    //   $get_sports_products = App\Models\Category::where('id',4)->get();
    //   $get_sports_products = $category->get_sports_products;
      
    //   return view('home', ['products' => $products ,'categories' => $categories, 'get_sports_products' => $get_sports_products] );
  
    return view('home', ['products' => $products ,'categories' => $categories] );

  })->name('home');



Route::get('/about', function () {
  $categories = App\Models\Category::all();
    return view('about',['categories' => $categories]);
});
Route::get('/mail', function () {
  $categories = App\Models\Category::all();
  return view('mail',['categories' => $categories]);
});
// Route::get('single_product/{id}', function () {
//     // $viewSingleProduct = Product::findOrFail($id);
//     // return view('single',['viewSingleProduct' => $viewSingleProduct]);
//     return view('single');
//     // $viewProduct = Product::latest()->get();
//     // return view('admin.products.index', ['viewProduct' => $viewProduct] );
// });
// Route::get('/viewCart', function () {
//     return view('cart');
// });
// Route::get('/electronic_product', function (App\Models\Category $category) {
//     $categories_electronics = App\Models\Category::all();
//      $categories_electronics = $category->categories_electronics;

//     return view('home', ['categories_electronics' => $categories_electronics] );
// });
// Route::get('/get_sports_category_product', function (App\Models\Category $category) {
//     $cate = $category->cate;
//     return view('home', ['categories_electronics' => $cate] );
// });

// Route::get('/login', function () {
//     return view('auth\login');
// });



Route::get('viewCart', [CartController::class, 'index'])->name('viewCart');
Route::post('addCart', [CartController::class, 'addToCart'])->name('addCart');
Route::get('deleteCart/{id}', [CartController::class, 'delete']);
Route::GET('updateCart/{id}', [CartController::class,'update']);

Route::get('single_product/{id}', [ProductController::class,'index']);



Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('submit-login', [LoginController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [LoginController::class, 'registration'])->name('register');
Route::post('submit-registration', [LoginController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [LoginController::class, 'dashboard']); 
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route::post('createProduct', [ProductController::class, 'createProduct']); 
//Route::get('viewProduct', [App\Http\Controllers\Admin\ProductController::class, 'viewProduct']); 

// Route::resource('viewProduct', App\Http\Controllers\Admin\ProductController::class);
// Route::resource('viewCategory', App\Http\Controllers\Admin\CategoryController::class);
// Route::resource('viewSubCategory', App\Http\Controllers\Admin\SubCategoryController::class);


Route::get('viewSubCategory', [App\Http\Controllers\Admin\SubCategoryController::class,'index'])->name('subcategory_list');
Route::get('createSubCategory', [App\Http\Controllers\Admin\SubCategoryController::class,'create']);
Route::post('storeSubCategory', [App\Http\Controllers\Admin\SubCategoryController::class,'store']);
Route::get('deleteSubCategory/{id}',[App\Http\Controllers\Admin\SubCategoryController::class, 'destroy']);
Route::get('editSubCategory/{id}', [App\Http\Controllers\Admin\SubCategoryController::class,'edit']);
Route::put('updateSubCategory/{id}', [App\Http\Controllers\Admin\SubCategoryController::class,'update']);

//Route::get('viewProduct', [App\Http\Controllers\Admin\ProductController::class,'index'])->name('product_list');
Route::get('viewProduct','App\Http\Controllers\Admin\ProductController@index')->name('product_list');
Route::get('deleteProduct/{id}',[App\Http\Controllers\Admin\ProductController::class, 'destroy']);
Route::get('createProduct', [App\Http\Controllers\Admin\ProductController::class,'create']);
Route::post('storeProduct', [App\Http\Controllers\Admin\ProductController::class,'store']);
Route::get('editProduct/{id}', [App\Http\Controllers\Admin\ProductController::class,'edit']);
Route::put('editProduct/{id}', [App\Http\Controllers\Admin\ProductController::class,'update']);


Route::get('viewCategory', [App\Http\Controllers\Admin\CategoryController::class,'index'])->name('category_list');
Route::get('deleteCategory/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
Route::get('createCategory', [App\Http\Controllers\Admin\CategoryController::class,'create']);
Route::post('storeCategory', [App\Http\Controllers\Admin\CategoryController::class,'store']);
Route::get('editCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class,'edit']);
Route::put('editCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class,'update']);

// Route::get('editCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class,'edit']);
// Route::put('editCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class,'update']);


Route::get('findProductName',[App\Http\Controllers\Admin\ProductController::class,'findProductName']);
//Route::post('findProductName/{id}','ProductController@findProductName');

Route::get('/abc', function () {
    return view('admin.sub_category.abc');
});
