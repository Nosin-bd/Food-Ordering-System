<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [App\Http\Controllers\FrontendHomeController::class, 'index'])->name('homepage');
Route::get('/register-page', [App\Http\Controllers\FrontendHomeController::class, 'registerPage'])->name('register.page');
Route::get('/login-page', [App\Http\Controllers\FrontendHomeController::class, 'loginPage'])->name('login.page');
Route::post('/custom-login', [App\Http\Controllers\FrontendHomeController::class, 'customLogin'])->name('login.custom');
Route::post('/custom-registration', [App\Http\Controllers\FrontendHomeController::class, 'customRegistration'])->name('registration.custom');
Route::get('signout', [App\Http\Controllers\FrontendHomeController::class, 'signOut'])->name('signout');

Route::post('/contact', [App\Http\Controllers\FrontendHomeController::class, 'contactSend'])->name('contact.send');

Route::group(['middleware' => ['customer']], function () {
    Route::match(['get','post'],'/order', [App\Http\Controllers\FrontendHomeController::class, 'order'])->name('order');
    Route::get('/order-page/{res_id}', [App\Http\Controllers\FrontendHomeController::class, 'orderPage'])->name('order.page');
    Route::get('/my-order', [App\Http\Controllers\FrontendHomeController::class, 'myOrder'])->name('my.order');
    Route::post('/order/{res_id}', [App\Http\Controllers\FrontendHomeController::class, 'createOrder'])->name('order.create');
});

Route::get('/about', function () {
    return view('frontend.about');
})->name('about.page');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact.page');

Route::get('/admin', function () {
    if( Auth::user() &&  Auth::user()->isAdmin != 1 ){
        Session::flush();
        Auth::logout();
    }
    return view('home');
});

Route::group(['middleware' => ['admin']], function () {
    // Restaurant Route
    Route::get('/restaurant', [App\Http\Controllers\HomeController::class, 'restaurant'])->name('restaurant');
    Route::post('/restaurant', [App\Http\Controllers\HomeController::class, 'store'])->name('restaurant.create');
    Route::post('/update-restaurant/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('restaurant.update');
    Route::get('/delete-restaurant/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('restaurant.delete');
    Route::get('/restaurant-menu/{id}', [App\Http\Controllers\HomeController::class, 'restaurantMenu'])->name('restaurant.menu');

    // Menu Route
    Route::post('/menu/{id}', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
    Route::post('/menu-update/{id}/{res_id}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
    Route::get('/delete-menu/{id}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.delete');
    Route::resource('menus', MenuController::class);

    // Order
    Route::get('/view-orders', [App\Http\Controllers\HomeController::class, 'ordersView'])->name('orders.view');
    Route::post('/update-status', [App\Http\Controllers\HomeController::class, 'orderStatus'])->name('orders.status');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
