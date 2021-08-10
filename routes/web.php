<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentsController;
use App\Models\Document;

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

Route::redirect('/','/login');

Route::get('/dashboard', [DocumentsController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::post('/download/{id}', [DocumentsController::class, 'download'])->name('descarga');
Route::view('/documents/create', 'create')->name('documents.create');
Route::post('/documents/create', [DocumentsController::class, 'store'])->name('create');
Route::post('/filter', [DocumentsController::class, 'filter'])->name('document.filter');
Route::delete('/documents/{id}', [DocumentsController::class, 'destroy'])->name('cursos.destroy');

require __DIR__.'/auth.php';
