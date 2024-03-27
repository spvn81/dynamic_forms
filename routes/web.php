<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ResponseController;




Route::get('/', function () {
    return view('welcome');
});


Route::get('/forms', [FormController::class, 'index'])->name('forms.index');
Route::get('/forms/create', [FormController::class, 'create'])->name('forms.create');
Route::post('/forms', [FormController::class, 'store'])->name('forms.store');
Route::get('/forms/{form}', [FormController::class, 'show'])->name('forms.show');
Route::get('/forms/{form}/edit', [FormController::class, 'edit'])->name('forms.edit');
Route::put('/forms/{form}', [FormController::class, 'update'])->name('forms.update');
Route::delete('/forms/{form}', [FormController::class, 'destroy'])->name('forms.destroy');
Route::post('/responses/{form_id}', [ResponseController::class, 'store'])->name('responses.store');
Route::get('/responses/{response}', [ResponseController::class, 'show'])->name('responses.show');
