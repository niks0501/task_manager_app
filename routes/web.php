<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::patch('/tasks/{task}/complete', [App\Http\Controllers\TaskController::class, 'complete'])->name('tasks.complete');
