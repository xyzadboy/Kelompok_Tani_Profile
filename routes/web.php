<?php

use Illuminate\Support\Facades\Route;


// Route::view('/', 'welcome')->name('home');
Route::view('/', 'pages.home');
Route::View('/blok', 'pages.blok');

use App\Http\Controllers\BlockController;
Route::get('/get-blocks', [BlockController::class, 'getBlocks'])->name('get-blocks');

use App\Http\Controllers\LegalitasController;
Route::get('/legalitas', [LegalitasController::class, 'index'])->name('legalitas.index');
Route::get('/legalitas/{id}/download', [LegalitasController::class, 'download'])->name('legalitas.download');

use App\Http\Controllers\GalleryController;
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');

use App\Http\Controllers\ContactController;
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

use App\Http\Controllers\BlogController;
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');