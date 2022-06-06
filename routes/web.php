<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\dashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('post',[postController::class,'index'])->name('post_index');
Route::post('post',[postController::class,'create'])->name('post_create');
Route::get('post/edit/{id}',[postController::class,'edit'])->name('post_edit');
Route::put('post/edit/{id}',[postController::class,'update'])->name('post_update');
Route::get('post/delete/{id}',[postController::class,'destroy'])->name('post_destroy');

Route::get('/dashboard',[dashboardController::class,'show_post'])->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
