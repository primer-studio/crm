<?php

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

Route::get('/', ['App\Http\Controllers\HomeController', 'index'])->name('Home > Index');

//Route::get('/panel', function () {
//    return (\Illuminate\Support\Facades\Auth::user()->rule == 'admin')
//        ? redirect(\route('Admin > Dashboard'))
//        : redirect(\route('Customer > Dashboard'));
//})->name('Auto Redirect To Panel');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'HasAdminAccess'])->group(function () {
    Route::prefix('cfx63_admin')->group(function () {
        Route::get('/dashboard', ['App\Http\Controllers\AdminController', 'dashboard'])->name('Admin > Dashboard');
        Route::get('/departments', ['App\Http\Controllers\DepartmentController', 'index'])->name('Admin > Departments > Manage');
        Route::get('/users', ['App\Http\Controllers\UserController', 'index'])->name('Admin > Customers > Manage');
        Route::get('/services', ['App\Http\Controllers\ServiceController', 'index'])->name('Admin > Services > Manage');
        Route::get('/threads', ['App\Http\Controllers\ThreadController', 'index'])->name('Admin > Threads > Manage');
        Route::get('/thread/{id}', ['App\Http\Controllers\ThreadController', 'show'])->name('Admin > Threads > Show');
        Route::get('/invoices', ['App\Http\Controllers\InvoiceController', 'index'])->name('Admin > Invoices > Manage');
        Route::get('/invoices/show/{hash}', ['App\Http\Controllers\InvoiceController', 'show'])->name('Admin > Invoices > Show');
    });
});

Route::middleware(['auth:sanctum', 'verified', 'HasUserAccess'])->group(function () {
    Route::prefix('panel')->group(function () {
        Route::get('/dashboard', ['App\Http\Controllers\UserController', 'dashboard'])->name('Customer > Dashboard');
        Route::get('/services', ['App\Http\Controllers\UserController', 'services'])->name('Customer > Services');
        Route::get('/threads', ['App\Http\Controllers\UserController', 'threads'])->name('Customer > Threads > Manage');
        Route::get('/thread/{id}', ['App\Http\Controllers\UserController', 'showThread'])->name('Customer > Threads > Show');
        Route::get('/invoices', ['App\Http\Controllers\UserController', 'invoices'])->name('Customer > Invoices > Manage');
        Route::get('/invoices/show/{hash}', ['App\Http\Controllers\UserController', 'showInvoice'])->name('Customer > Invoices > Show');
    });
});
