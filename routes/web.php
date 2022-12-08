<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderController;


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
Route::get('/', [PageController::class, 'getIndex'])->name('trang-chu');
Route::get('/loai-san-pham/{id}', [PageController::class, 'getLoai'])->name('loai-san-pham');
Route::get('/type/{id}', [PageController::class, 'getType'])->name('ti_le');
Route::get('/product/{id}', [PageController::class, 'getDetail'])->name('chi_tiet');
Route::get('/map', [PageController::class, 'getMap'])->name('map');

Route::get('/register', [PageController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [PageController::class, 'postRegister'])->name('postRegister');

Route::get('/login', [PageController::class, 'getLogin'])->name('getlogin');
Route::post('/login', [PageController::class, 'postLogin'])->name('postlogin');

Route::get('/logout', [PageController::class, 'getLogout'])->name('logout');

Route::get('/resetpassword', [PageController::class, 'getResetPassword'])->name('getResetPassword');
Route::post('/resetpassword', [PageController::class, 'postResetPassword'])->name('postResetPassword');

Route::get('/search', [PageController::class, 'getSearch'])->name('getsearch');

Route::get('/blog', [PageController::class, 'getBlog'])->name('blog');
Route::get('/blog/{id}', [PageController::class, 'blog_detail'])->name('blog-detail');

Route::group(['middleware' => 'checkdangnhap'], function(){
    //thêm sản phẩm yêu thích
    Route::get('add-product-like/{id}',[PageController::class , 'addProductLike'])->name('add-productlike');

    //hiển thị ra
    Route::get('product-like',[PageController::class , 'getProductLike'])->name('getProductLike');

    //add giỏ hàng
    Route::get('add-cart/{id}',[PageController::class , 'addCart'])->name('add-cart');

    Route::get('show-cart', [PageController::class, 'showCart'])->name('show-cart');

    Route::get('check-out', [PageController::class, 'getCkectOut'])->name('getdathang');

    Route::post('counpon', [PageController::class, 'postCounpon'])->name('postcounpon');

    Route::post('check-out', [PageController::class, 'postCkectOut'])->name('postdathang');

    Route::get('delete-product/{id}',[PageController::class , 'DeleteProduct'])->name('delete-product');


});


Route::get('/login/admin', [AdminController::class, 'Getlogin'])->name('admin.getlogin');
Route::post('/login/admin', [AdminController::class, 'Postlogin'])->name('admin.postlogin');

Route::get('/logout/admin', [AdminController::class, 'Getlogout'])->name('admin.logout');

Route::group(['prefix' => 'admin' ,'middleware' => 'checkdangnhapadmin'], function(){
    Route::get('/home', [AdminController::class, 'index'])->name('admin');
    Route::group(['prefix'=>'quanlyhangxe'],function(){
        Route::get('danhsach', [ManufactureController::class, 'index'])->name('manufacture.index');
        Route::get('add', [ManufactureController::class, 'GetAdd'])->name('manufacture.getadd');
        Route::post('add', [ManufactureController::class, 'PostAdd'])->name('manufacture.postadd');

        Route::delete('delete/{id}', [ManufactureController::class, 'delete'])->name('manufacture.delete');

        Route::get('edit/{id}', [ManufactureController::class, 'GetEdit'])->name('manufacture.getedit');
        Route::post('update/{id}', [ManufactureController::class, 'Update'])->name('manufacture.update');

    });
    Route::group(['prefix'=>'quanlynhansu'],function(){
        Route::group(['prefix'=>'user'],function(){
            Route::get('danhsach', [UserController::class, 'ListUser'])->name('user.list');

            Route::delete('delete/{id}', [UserController::class, 'DeleteUser'])->name('user.delete');

            Route::get('edit/{id}', [UserController::class, 'EditUser'])->name('user.edit');
            Route::post('update/{id}', [UserController::class, 'UpdateUser'])->name('user.update');
        });

    });
    Route::group(['prefix'=>'quanlysanpham'],function(){
        Route::get('danhsach', [ProductController::class, 'ListProduct'])->name('product.list');
        Route::get('danhsach/{id}', [ProductController::class, 'ListProductLoai'])->name('product.loai');

        Route::get('chitiet/{id}', [ProductController::class, 'getDetail'])->name('product.chitiet');

        Route::get('them', [ProductController::class, 'getAdd'])->name('product.them');
        Route::post('them', [ProductController::class, 'postAdd'])->name('product.postthem');

        Route::get('edit/{id}', [ProductController::class, 'getEdit'])->name('product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');

        Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    });

    Route::group(['prefix'=>'quanlydonhang'],function(){
        Route::get('danhsach', [OrderController::class, 'List'])->name('order.list');
        Route::get('danhsach/{id}', [OrderController::class, 'ListLoai'])->name('order.listloai');

        Route::get('chitiet/{id}', [OrderController::class, 'Detail'])->name('order.chitiet');

        // Route::get('edit/{id}', [ProductController::class, 'getEdit'])->name('product.edit');
        // Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
    });
    Route::group(['prefix'=>'quanlyblog'],function(){
        Route::get('danhsach', [BlogController::class, 'List'])->name('blog.list');
        Route::get('chitiet/{id}', [BlogController::class, 'Detail'])->name('blog.chitiet');

        Route::get('them', [BlogController::class, 'getAdd'])->name('blog.them');
        Route::post('them', [BlogController::class, 'postAdd'])->name('blog.postthem');

        Route::get('edit/{id}', [BlogController::class, 'Edit'])->name('blog.edit');
        Route::post('update/{id}', [BlogController::class, 'update'])->name('blog.update');

        Route::delete('delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
    });
});
