<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\WebController;

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

//web pages
Route::get('/index', [WebController::class, 'index'])->name('index');
Route::fallback([ErrorController::class])->name('404');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/classes', [WebController::class, 'classes'])->name('classes');
Route::get('/facility', [WebController::class, 'facility'])->name('facility');
Route::get('/testimonial', [WebController::class, 'testimonial'])->name('testimonial');
Route::get('/callToAction', [WebController::class, 'callToAction'])->name('callToAction');
Route::get('/team', [WebController::class, 'team'])->name('team');
Route::get('/appointment', [WebController::class, 'appointment'])->name('appointment');


