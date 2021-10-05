<?php

use App\Http\Controllers\AnimalController;
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

Route::get('/',[AnimalController::class,'index'])->name('animal-list');
Route::get('/new',[AnimalController::class,'newanimal'])->name('new-animal');
Route::post('/savenew',[AnimalController::class,'savenewanimal'])->name('save-new-animal');
Route::get('/{id}/detail',[AnimalController::class,'animaldetail'])->name('animal-detail');
Route::get('/{id}/edit',[AnimalController::class,'animaledit'])->name('animal-edit');
Route::post('/{id}/saveedit',[AnimalController::class,'saveedit'])->name('animal-save-edit');
Route::post('/{id}/delete',[AnimalController::class,'deleteanimal'])->name('animal-delete');