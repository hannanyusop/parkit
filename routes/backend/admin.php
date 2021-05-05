<?php

use App\Http\Controllers\Backend\DashboardController;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\StudentController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::group([
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    'prefix' => 'student/',
    'as' => 'student.'
], function (){

    Route::get('add/', [StudentController::class, 'add'])->name('add');
    Route::post('add/', [StudentController::class, 'insert'])->name('insert');

    Route::get('', [StudentController::class, 'index'])->name('index');
    Route::get('view/{id}', [StudentController::class, 'view'])->name('view');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::post('edit/{id}', [StudentController::class, 'update'])->name('update');

    Route::get('import', [StudentController::class, 'import'])->name('import');
    Route::post('import', [StudentController::class, 'upload'])->name('upload');

    Route::get('reset', [StudentController::class, 'reset'])->name('reset');
    Route::post('reset', [StudentController::class, 'resetNow'])->name('reset-now');





});

Route::group([
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    'prefix' => 'class/',
    'as' => 'class.'
], function (){

    Route::get('', [StudentController::class, 'index'])->name('index');
    Route::get('{id}', [StudentController::class, 'view'])->name('view');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::post('edit/{id}', [StudentController::class, 'update'])->name('update');



});
