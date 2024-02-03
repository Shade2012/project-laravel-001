<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Models\Kelas;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentController;

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

Route::get('/home', function(){
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function(){
return view('about',[
    "title" => "About",
    "name" => "Damar Fikri Haikal",
    "email" =>"damarfikrihaikal2@gmail.com",
    "kelas" => "11 PPLG 2",
    "image" => "image/damar02.jpg",
    "github" => "https://github.com/Shade2012",
    "linkedin" => "https://www.linkedin.com/in/damar-fikri-haikal-539b65294/",
]);
});
Route::group(["prefix"=>"/student"],function(){
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

