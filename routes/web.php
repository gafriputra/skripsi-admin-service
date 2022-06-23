<?php

use App\Http\Controllers\Admin\Store\Product\DocumentsController;
use App\Http\Controllers\Admin\Store\Product\GalleriesController;
use App\Http\Controllers\Admin\Store\Product\ProductCategoriesController;
use App\Http\Controllers\Admin\Store\Product\ProductsController;
use App\Http\Controllers\Admin\Store\TransactionsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin', 'verified']) // nambahin satpamnya dr kernel
    ->group(function () {

        Route::get('/', function () {
            return view('pages.admin.dashboard');
        });
        // store
        Route::resource('product-categories', ProductCategoriesController::class);
        Route::resource('products', ProductsController::class);
        Route::resource('gallery', GalleriesController::class);
        Route::resource('document', DocumentsController::class);
        Route::resource('transaction', TransactionsController::class);
        Route::get('transactionStatus', 'Store\TransactionsController@setStatus')->name('transactionStatus');

        Route::get('/document', function () {
            return view('pages.admin.product.document');
        })->name('document');
        Route::get('/form-document', function () {
            return view('pages.admin.product.form-document');
        })->name('form-document');
    });


Route::get('/pdf/{id}', 'PdfController@print')->name('print');
