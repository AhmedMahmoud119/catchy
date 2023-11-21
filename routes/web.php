<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogFileController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShippingCompanyController;
use App\Http\Controllers\ShippingCompanyCostController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('login.post');
});

Route::group([
    'middleware' => ['auth:admin'],
    'prefix' => 'admin',
    'as'     => 'admin.',
], function () {

    Route::get('/logout', [AdminAuthController::class, 'adminLogout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/users', [UsersController::class, 'index'])->name('users');

    Route::resource('/admins',AdminsController::class);

    Route::resource('/roles',RoleController::class);

    Route::resource('/countries',CountryController::class);

    Route::resource('/states',StateController::class);

    Route::resource('/shipping-companies',ShippingCompanyController::class);

    Route::resource('/shipping-company-costs',ShippingCompanyCostController::class);

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/{type?}', [OrdersController::class, 'index'])->name('index');
        Route::get('/show/{id}', [OrdersController::class, 'show'])->name('show');
        Route::post('/update-status/{id}', [OrdersController::class, 'updateStatus'])->name('update-status');
        Route::post('/update-source/{id}', [OrdersController::class, 'updateSource'])
            ->name('update-source');
        Route::post('/update-payment-status/{id}', [OrdersController::class, 'updatePaymentStatus'])
            ->name('update-payment-status');


        Route::post('/print', [OrdersController::class, 'printOrder'])->name('print');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {

        Route::get('/', [ProductsController::class, 'index'])->name('index');
        Route::get('/report', [ProductsController::class, 'report'])->name('report');

        Route::get('/stock/{id}', [ProductsController::class, 'stock'])->name('stock');
        Route::post('/stock/update', [ProductsController::class, 'stockUpdate'])->name('stock.update');

        Route::get('/price/{id}', [ProductsController::class, 'price'])->name('price');
        Route::post('/price/update', [ProductsController::class, 'priceUpdate'])->name('price.update');

    });

    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis');

    Route::get('/profit-report', [AnalysisController::class, 'profitReport'])->name('profit-report');




});

Route::get('/clear-cache', function() {
    $exitCode = \Artisan::call('config:cache');
    $exitCode = \Artisan::call('config:clear');
    $exitCode = \Artisan::call('optimize:clear');
    $exitCode = \Artisan::call('view:clear');
    return 'dsadas';
    // return what you want
});

Route::get('/view', function() {
    return view('admin.orders.print');
});


