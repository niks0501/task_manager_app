<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::patch('/tasks/{task}/complete', [App\Http\Controllers\TaskController::class, 'complete'])->name('tasks.complete');
Route::delete('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.delete');
Route::get('/tasks/edit/{task}', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
Route::get('/tasks/trash', [App\Http\Controllers\TaskController::class, 'trash'])->name('tasks.trash');
Route::patch('/tasks/{id}/restore', [App\Http\Controllers\TaskController::class, 'restore'])->name('tasks.restore');
