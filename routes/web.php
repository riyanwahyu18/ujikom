<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

Route::get('/', [AuthController::class, 'login'])->middleware('checkAuth');
Route::post('action-login', [AuthController::class, 'actionLogin']);
Route::get('logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'checkAuth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:Kasir')->group(function () {
        Route::get('pos-sale', [TransactionController::class, 'create']);
        Route::post('pos-sale', [TransactionController::class, 'store'])->name('pos-sale.store');
    });

    Route::resource('users', UsersController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);


    Route::resource('pos', TransactionController::class);
    Route::get('print/{id}', [TransactionController::class, 'print'])->name('print');
});

Route::middleware(['role:Kasir'])->group(function () {});





// Route::middleware('role:admin')->group(function () {
//   Route::get('/test', function () {
//       return view('hello-world'); // mengembalikan view 'hello-world'
//   });
// });
