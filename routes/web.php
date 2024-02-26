<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Models\Kelas;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Middleware\RedirectIfAuthenticated;

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

Route::get('/home', [HomeAboutController::class, 'home']);
Route::group(["prefix"=>"/login"],function(){
    Route::middleware([RedirectIfAuthenticated::class])->group(function () {
        Route::get('/index', [AuthController::class, 'login']);
        Route::post('/post', [AuthController::class, 'loginPost']);
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::group(["prefix"=>"/register"],function(){
    Route::post('/store', [AuthController::class, 'store']);
    Route::get('/index', [AuthController::class, 'register']);
});
Route::get('/about', [HomeAboutController::class, 'about']);

Route::group(["prefix"=>"/student"],function(){
    Route::get('/all', [StudentController::class, 'indexhome']);
    Route::get('/detail/{student}', [StudentController::class, 'show']);
    Route::get('/edit/{student}', [StudentController::class, 'edit']);
    Route::put('/update/{student}', [StudentController::class, 'update']);
    Route::get('/create', [StudentController::class, 'create']);
    Route::post('/add', [StudentController::class, 'add']);
    Route::delete('/delete/{student}', [StudentController::class,'destroy']);
});
Route::group(["prefix"=>"/kelas"],function(){
    Route::get('/all', [KelasController::class, 'indexhome']);
    Route::get('/detail/{kelas}', [KelasController::class, 'show']);
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::put('/update/{kelas}', [KelasController::class, 'update']);
    Route::get('/create', [KelasController::class, 'create']);
    Route::post('/add', [KelasController::class, 'add']);
    Route::delete('/delete/{kelas}', [KelasController::class,'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::prefix('student')->group(function () {
            Route::get('/all', [StudentController::class, 'index']);
            Route::get('/detail/{student}', [StudentController::class, 'show']);
            Route::get('/edit/{student}', [StudentController::class, 'edit']);
            Route::put('/update/{student}', [StudentController::class, 'update']);
            Route::get('/create', [StudentController::class, 'create']);
            Route::post('/add', [StudentController::class, 'add']);
            Route::delete('/delete/{student}', [StudentController::class,'destroy']);
        });
        Route::group(["prefix"=>"/kelas"],function(){
            Route::get('/all', [KelasController::class, 'index']);
            Route::get('/detail/{kelas}', [KelasController::class, 'show']);
            Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
            Route::put('/update/{kelas}', [KelasController::class, 'update']);
            Route::get('/create', [KelasController::class, 'create']);
            Route::post('/add', [KelasController::class, 'add']);
            Route::delete('/delete/{kelas}', [KelasController::class,'destroy']);
        });
    });
});

