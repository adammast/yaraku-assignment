<?php

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

Route::get('/', [\App\Http\Controllers\BookController::class, 'index']);
Route::resource('books', BookController::class);

Route::get('/export/csv', [\App\Http\Controllers\BookController::class, 'exportCsv'])->name('export.csv');
Route::get('/export/xml', [\App\Http\Controllers\BookController::class, 'exportXml'])->name('export.xml');
