<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
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
    return view('welcome');
});
//Route::get('/admin/register', function(Request $request) {
//    return User::create(['name' => 'admin', 'password' => hash::make('toor'), 'email' => 'admin@admin.admin']);
//});
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'admin']);
    Route::get('/category/{id}', [AdminController::class, 'category']);
    Route::post('/editCategory/', [AdminController::class, 'editCategory'])->name('editCategory');
});
