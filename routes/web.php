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

Route::get('/login', function () {
    return view('login');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/adminregisterform', function () {
    return view('adminregister');
});

Auth::routes();
Route::get('/', [App\Http\Controllers\MyController::class, 'welcome']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/alogin', [App\Http\Controllers\MyController::class, 'adminloginform']);
Route::post('/adminlogin', [App\Http\Controllers\MyController::class, 'adminlogin']);
Route::post('/adminregisterform', [App\Http\Controllers\MyController::class, 'adminregisterform']);
Route::post('/adminregister', [App\Http\Controllers\MyController::class, 'adminregister']);
Route::get('/adminpanel', [App\Http\Controllers\MyController::class, 'adminpanel']);
Route::get('/studentsmanage', [App\Http\Controllers\MyController::class, 'studentsmanage']);
Route::get('/delstudent/{id}', [App\Http\Controllers\MyController::class, 'delstudent']);
Route::get('/deleteslider/{id}', [App\Http\Controllers\MyController::class, 'deleteslider']);

Route::get('/editstudentform/{id}', [App\Http\Controllers\MyController::class, 'editstudentform']);
Route::post('/updatestudent/{id}', [App\Http\Controllers\MyController::class, 'updatestudent']);
Route::get('/slidermanage', [App\Http\Controllers\MyController::class, 'slidermanage']);
Route::get('/darsmanageform', [App\Http\Controllers\MyController::class, 'darsmanageform'])->name('courses');
Route::resource('/blog', App\Http\Controllers\Administrator\BlogController::class)->parameters(['dore' => 'id']);
Route::post('/uploadslider', [App\Http\Controllers\MyController::class, 'uploadslider']);
Route::post('/addcourse', [App\Http\Controllers\MyController::class, 'addcourses']);
Route::get('/deletecourse/{id}', [App\Http\Controllers\MyController::class, 'deleteCourse']);
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/course/{id}', [App\Http\Controllers\MyController::class, 'show']);
Route::get('/add-to-cart/{id}', [App\Http\Controllers\MyController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [App\Http\Controllers\MyController::class, 'getCart'])->name('cart.get');
Route::get('/remove-item/{id}', [App\Http\Controllers\MyController::class, 'removeItem'])->name('cart.remove');
Route::get('/download/course/{id}', [App\Http\Controllers\MyController::class, 'download'])->middleware('auth');

Route::get('/orders', [App\Http\Controllers\MyController::class, 'orders'])->middleware('auth');

Route::post('/payment', [App\Http\Controllers\MyController::class, 'payment'])->name('payment')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Route
     */
    Route::get('/logout',  [App\Http\Controllers\MyController::class, 'logout'])->name('logout');
});











Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
