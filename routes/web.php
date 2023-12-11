<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\Frontend\frontend::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\Frontend\frontend::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\Frontend\frontend::class, 'aboutus'])->name('aboutus');
Route::get('/contact', [App\Http\Controllers\Frontend\frontend::class, 'contact'])->name('contact');
Route::Post('/contact-us', [App\Http\Controllers\Frontend\frontend::class, 'contactus'])->name('contactus');
Route::post('newsletter', [App\Http\Controllers\Frontend\frontend::class, 'newsletter'])->name('newsletter');




Route::get('/category', [App\Http\Controllers\Frontend\frontend::class, 'categories'])->name('category');
Route::get('view-category/{slug}', [App\Http\Controllers\Frontend\frontend::class, 'viewcategory'])->name('viewcategory');
Route::get('view-category/{cate_slug}/{prod_slug}', [App\Http\Controllers\Frontend\frontend::class, 'productview'])->name('productview');
Route::get('view-product/{slug}', [App\Http\Controllers\Frontend\frontend::class, 'productviewdetail'])->name('productviewdetail');
Route::get('/search-product', [App\Http\Controllers\Frontend\frontend::class, 'searchproductajax'])->name('frontend.search');
Route::post('/front-search-product', [App\Http\Controllers\Frontend\frontend::class, 'frontsearchproduct'])->name('frontend.search.product');









Auth::routes();

Route::post('add-to-cart', [App\Http\Controllers\Frontend\cartcontroller::class, 'addtocart'])->name('addtocart');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Frontend\dashboardcontroller::class, 'index'])->name('dashboard');
    Route::get('view-order/{id}', [App\Http\Controllers\Frontend\dashboardcontroller::class, 'vieworder'])->name('view-order');



Route::get('cart', [App\Http\Controllers\Frontend\cartcontroller::class, 'viewcart'])->name('viewcart');
Route::post('delete-cart-item', [App\Http\Controllers\Frontend\cartcontroller::class, 'deletecartitem'])->name('deletecartitem');
Route::post('update-cart', [App\Http\Controllers\Frontend\cartcontroller::class, 'updatecart'])->name('updatecart');
Route::get('checkout', [App\Http\Controllers\Frontend\checkoutcontroller::class, 'index'])->name('checkout');
Route::get('checkout-status', [App\Http\Controllers\Frontend\checkoutcontroller::class, 'checkoutstatus'])->name('checkoutstatus');
Route::post('place-order', [App\Http\Controllers\Frontend\checkoutcontroller::class, 'placeorder'])->name('placeorder');
Route::get('my-order', [App\Http\Controllers\Frontend\myordercontroller::class, 'index'])->name('myorder');








    
});
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\dashboardcontroller::class, 'index'])->name('home1');

    // categories 
    Route::get('/categories', [App\Http\Controllers\admin\cateegorycontroller::class, 'index'])->name('category.index');
    Route::get('/categories/create', [App\Http\Controllers\admin\cateegorycontroller::class, 'create'])->name('category.create');
    Route::post('/categories/store', [App\Http\Controllers\admin\cateegorycontroller::class, 'store'])->name('category.store');
    Route::get('/categories/edit/{id}', [App\Http\Controllers\admin\cateegorycontroller::class, 'edit'])->name('category.edit');
    Route::post('/categories/Update/{id}', [App\Http\Controllers\admin\cateegorycontroller::class, 'update'])->name('category.update');
    Route::get('/categories/delete/{id}', [App\Http\Controllers\admin\cateegorycontroller::class, 'destroy'])->name('category.destroy');

    //  brands 
    Route::get('/brands', [App\Http\Controllers\admin\brandcontroller::class, 'index'])->name('brand.index');
    Route::get('/brands/create', [App\Http\Controllers\admin\brandcontroller::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [App\Http\Controllers\admin\brandcontroller::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{id}', [App\Http\Controllers\admin\brandcontroller::class, 'edit'])->name('brand.edit');
    Route::post('/brand/Update/{id}', [App\Http\Controllers\admin\brandcontroller::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [App\Http\Controllers\admin\brandcontroller::class, 'destroy'])->name('brand.destroy');

    // product 
    Route::get('/products', [App\Http\Controllers\admin\productcontroller::class, 'index'])->name('product.index');
    Route::get('/product/create', [App\Http\Controllers\admin\productcontroller::class, 'create'])->name('product.create');
    Route::post('/product/store', [App\Http\Controllers\admin\productcontroller::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [App\Http\Controllers\admin\productcontroller::class, 'edit'])->name('product.edit');
    Route::post('/product/Update/{id}', [App\Http\Controllers\admin\productcontroller::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [App\Http\Controllers\admin\productcontroller::class, 'destroy'])->name('product.destroy');

    // show order in adminpanel 
    Route::get('order', [App\Http\Controllers\admin\ordercontroller::class, 'index'])->name('order.index');
    Route::get('/admin-view-order/{id}', [App\Http\Controllers\admin\ordercontroller::class, 'adminvieworder'])->name('admin.order.view');
    Route::post('/admin-order-update/{id}', [App\Http\Controllers\admin\ordercontroller::class, 'orderupdate'])->name('admin.order.update');
    Route::get('order-history', [App\Http\Controllers\admin\ordercontroller::class, 'orderhistory'])->name('order.history');
    Route::get('admin-user', [App\Http\Controllers\admin\dashboardcontroller::class, 'adminuser'])->name('admin.user');
    Route::get('/admin-user-detail/{id}', [App\Http\Controllers\admin\dashboardcontroller::class, 'adminuserdetail'])->name('admin.user.detail');
























});

