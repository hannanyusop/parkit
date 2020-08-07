<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;
use LaravelQRCode\Facades\QRCode;
/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });

Route::get('qr', function () {
//
//    return  QRCode::url('werneckbh.github.io/qr-code/')
//        ->setSize(8)
//        ->setMargin(2)
//        ->png();
    
    return view('frontend.pages.qr');
//        ->withQr(\LaravelQRCode\Facades\QRCode::text('QR Code Generator for Laravel!')->png());

});
