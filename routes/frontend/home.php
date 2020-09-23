<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Frontend\FrontendStudentController;
use App\Http\Controllers\Portal\MainController;
use App\Http\Controllers\Portal\AsramaController;
use App\Http\Controllers\Portal\DownloadController;
use App\Http\Controllers\Portal\SmkalController;
/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('student-information/', [FrontendStudentController::class, 'info'])->name('student-info');
Route::get('search', [FrontendStudentController::class, 'search'])->name('student-search');


Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });

Route::get('test', function (){

    dd('test');
});

Route::group([
    'prefix' => '/',
    'as' => 'portal.'
], function (){

    Route::get('', [MainController::class, 'home'])->name('home');

    Route::group([
        'as' => 'smkal.'
    ], function (){

        Route::get('pengenalan/', [SmkalController::class, 'pengenalan'])->name('pengenalan');
        Route::get('pertusan-pengetua/', [SmkalController::class, 'pengetua'])->name('pengetua');
        Route::get('organisasi/', [SmkalController::class, 'organisasi'])->name('organisasi');
        Route::get('visi-misi/', [SmkalController::class, 'visi'])->name('visi');


    });

    Route::group([
        'as' => 'asrama.',
        'prefix' => 'asrama/'
    ], function (){

        Route::get('direktori/', [AsramaController::class, 'direktori'])->name('direktori');
        Route::get('halatuju/', [AsramaController::class, 'halatuju'])->name('halatuju');
        Route::get('dokumentasi/', [AsramaController::class, 'dokumentasi'])->name('dokumentasi');
        Route::get('dokumentasi/fail/{name}', [AsramaController::class, 'dokumentasiFail'])->name('dokumentasi-fail');

        Route::get('kemudahan/', [AsramaController::class, 'kemudahan'])->name('kemudahan');
        Route::get('dewan-makan/', [AsramaController::class, 'dewanMakan'])->name('dewan-makan');
        Route::get('surau/', [AsramaController::class, 'surau'])->name('surau');

    });

    Route::group([
        'as' => 'download.',
        'prefix' => 'download/'
    ], function (){

        Route::get('borang', [DownloadController::class, 'borang'])->name('borang');

    });
});
