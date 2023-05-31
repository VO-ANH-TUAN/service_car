<?php

use App\Http\Controllers\Admin\ServiceCarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\loginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\View\Composers\CartComposer;
use PHPUnit\TextUI\XmlConfiguration\Group;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin/user/login', [loginController::class,'index'])->name('login');
Route::post('admin/user/login/store', [loginController::class,'store']);

Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){
        Route::get('/', [MainController::class,'index'])->name('admin');
        Route::get('main', [MainController::class,'index']);

        //menu
        Route::prefix('menus')->group(function(){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
//            Route::post('ck/upload',[MenuController::class,'ckUpload'])->name('ck.upload');
            Route::get('list',[MenuController::class,'index']);
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
            Route::delete('destroy',[MenuController::class,'destroy']);
        });
        // Product
        Route::prefix('products')->group(function(){
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::post('upload',[ProductController::class,'upload'])->name('ckeditor.upload');
            Route::get('list',[ProductController::class,'index']);
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::delete('destroy',[ProductController::class,'destroy']);
        });
         // Slider
         Route::prefix('sliders')->group(function(){
            Route::get('add',[SliderController::class,'create']);
            Route::post('add',[SliderController::class,'store']);
            Route::get('list',[SliderController::class,'index']);
            Route::get('edit/{slider}',[SliderController::class,'show']);
            Route::post('edit/{slider}',[SliderController::class,'update']);
            Route::delete('destroy',[SliderController::class,'destroy']);
        });
         //Service
        Route::prefix('services')->group(function(){
            Route::get('add',[ServiceCarController::class,'create']);
            Route::post('add',[ServiceCarController::class,'store']);
            Route::get('list',[ServiceCarController::class,'index']);
            Route::get('edit/{service}',[ServiceCarController::class,'show']);
            Route::post('edit/{service}',[ServiceCarController::class,'update']);
            Route::delete('destroy',[ServiceCarController::class,'destroy']);
        });
        //News
        Route::prefix('news')->group(function(){
            Route::get('add',[NewsController::class,'create']);
            Route::post('add',[NewsController::class,'store']);
            Route::get('list',[NewsController::class,'index']);
            Route::get('edit/{new}',[NewsController::class,'show']);
            Route::post('edit/{new}',[NewsController::class,'update']);
            Route::delete('destroy',[NewsController::class,'destroy']);
        });
        //Upload
        Route::post('upload/services',[UploadController::class,'store']);
        //Cart
        Route::prefix('customers')->group(function(){
        Route::get('/',[\App\Http\Controllers\Admin\CartController::class,'index']);
        Route::get('view/{customer}',[\App\Http\Controllers\Admin\CartController::class,'show']);
        Route::delete('destroy',[\App\Http\Controllers\Admin\CartController::class,'destroy']);
        });
        //Statist
        Route::prefix('statist')->group(function(){
            Route::get('/list',[\App\Http\Controllers\Admin\Statist::class,'view']);
//            Route::get('search',[App\Http\Controllers\ProductController::class,'search']);
        });
    });

});

Route::get('/', [App\Http\Controllers\Maincontroller::class, 'index']);
Route::get('about', [App\Http\Controllers\AboutController::class, 'index']);
Route::get('new', [App\Http\Controllers\NewController::class, 'index']);
//Load ra tat ca san pham
Route::post('/services/load-product', [App\Http\Controllers\Maincontroller::class, 'loadProduct']);

//Load san pham theo danh muc
Route::get('danh-muc/{id}-{Slug}.html',[App\Http\Controllers\MenuController::class,'index']);
Route::get('danh-muc/about',[App\Http\Controllers\MenuController::class,'about']);
Route::get('danh-muc/contact',[App\Http\Controllers\MenuController::class,'contact']);
Route::get('danh-muc/new',[App\Http\Controllers\MenuController::class,'new']);


// Load ra chi tiet san pham
Route::get('san-pham/{id}-{Slug}.html',[App\Http\Controllers\ProductController::class,'index']);
Route::get('search',[App\Http\Controllers\ProductController::class,'search']);
Route::post('add-cart',[App\Http\Controllers\CartController::class,'index']);
Route::get('san-pham/about',[App\Http\Controllers\ProductController::class,'about']);
Route::get('san-pham/contact',[App\Http\Controllers\ProductController::class,'contact']);
Route::get('san-pham/new',[App\Http\Controllers\ProductController::class,'new']);

//Cart
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);
Route::get('carts/about',[App\Http\Controllers\DiaryController::class,'about']);
Route::get('carts/contact',[App\Http\Controllers\DiaryController::class,'contact']);
Route::get('carts/new',[App\Http\Controllers\DiaryController::class,'new']);

// Nhat ki gio hang
Route::prefix('carts/customers')->group(function(){
    Route::get('/', [App\Http\Controllers\DiaryController::class, 'index']);
    Route::get('view/about', [App\Http\Controllers\DiaryController::class, 'about']);
    Route::get('view/contact', [App\Http\Controllers\DiaryController::class, 'contact']);
    Route::get('view/new', [App\Http\Controllers\DiaryController::class, 'new']);
    Route::get('view/{customer}', [App\Http\Controllers\DiaryController::class, 'show']);

});


//Checkout
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'check']);
Route::post('/vn-pay', [App\Http\Controllers\CheckoutController::class, 'vn_pay']);

//lien he
Route::get('contact', [App\Http\Controllers\ContactController::class, 'contact']);
Route::post('/send-message', [App\Http\Controllers\ContactController::class, 'sendMail'])->name('contact.send');




