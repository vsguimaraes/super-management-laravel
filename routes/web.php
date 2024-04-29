<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\TestController;
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

Route::get('/', [MainController::class, 'index'])->name('site.index')->middleware('access.log');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('site.about-us');
Route::get('/contact', [ContactController::class, 'index'])->name('site.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('site.contact');
Route::get('/login/{error?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'store'])->name('site.login');
Route::middleware('user.authenticate:default,guest')->prefix('/app')->group(function () { // o middleware funciona para todas as rotas do grupo
    //padrao,visitante - passagem de parametros para o middleware
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::resource('/product', ProductController::class);
    Route::resource('/client', ClientController::class);
    Route::resource('/product-detail', ProductDetailController::class);
    Route::resource('/order', OrderController::class);
    //Route::resource('/order-product', OrderProductController::class);

    Route::get('/suppliers', [SuppliersController::class, 'index'])->name('app.suppliers');
    Route::get('/suppliers/search', [SuppliersController::class, 'search'])->name('app.suppliers.search');
    Route::post('/suppliers/list', [SuppliersController::class, 'list'])->name('app.suppliers.list');
    Route::get('/suppliers/list', [SuppliersController::class, 'list'])->name('app.suppliers.list');
    Route::get('/suppliers/create', [SuppliersController::class, 'create'])->name('app.suppliers.create');
    Route::post('/suppliers/store', [SuppliersController::class, 'store'])->name('app.suppliers.store');
    Route::get('/suppliers/edit/{id}', [SuppliersController::class, 'edit'])->name('app.suppliers.edit');
    Route::put('/suppliers/update/{id}', [SuppliersController::class, 'update'])->name('app.suppliers.update');
    Route::get('/suppliers/destroy/{id}', [SuppliersController::class, 'destroy'])->name('app.suppliers.destroy');
    Route::get('/order-product/create/{order}', [OrderProductController::class, 'create'])->name('order-product.create');
    Route::post('/order-product/store/{order}', [OrderProductController::class, 'store'])->name('order-product.store');
    Route::delete('/order-product/destroy/{order_product}', [OrderProductController::class, 'destroy'])->name('order-product.destroy');
    //Route::middleware('access.log', 'user.authenticate')->get('/clients', [ClientsController::class, 'index'])->name('app.clients');;
    // posso passar mais de um middleware, seguindo a ordem de acesso
    Route::get('/logout', [LoginController::class, 'destroy'])->name('app.logout');
});

Route::get('/test/{p1}/{p2}',
    [TestController::class, 'test']
)->where('p1', '[0-9]+')->where('p2', '[0-9]+')->name('test');

/*
Route::get('/contact/{name}/{category_id?}',
    function(String $name, int $category_id = 1){
        return "Contatos: $name - $category_id";
    }
)->where('category_id', '[0-9]+')->where('name', '[A-Za-z]+');


Route::get('/rota1', function (){
    return "Rota 1";
})->name('site.rota1');

Route::get('/rota2', function (){
    return redirect()->route('site.rota1');
})->name('site.rota2'); // redirecionamento de rota pelo nome da rota

// Route::redirect('rota2', 'rota1'); // redirecionamento de rota pela URI
*/
Route::fallback(function() {
    return ('A rota informada não existe!! <a href="' . route('site.index') . '">Clique aqui para ser redirecionado.</a>');
});
