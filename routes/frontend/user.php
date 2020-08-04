<?php

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Frontend\User\CampaignController;
use App\Http\Controllers\Frontend\User\VoteController;
use App\Http\Controllers\Frontend\User\CampaignCardController;
use App\Http\Controllers\Frontend\User\ParticipantController;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group(['as' => 'user.', 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware('is_user')
        ->name('dashboard')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Dashboard'), route('frontend.user.dashboard'));
        });

    Route::get('account', [AccountController::class, 'index'])
        ->name('account')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('My Account'), route('frontend.user.account'));
        });


    #for moderator only
    Route::group([], function (){

        #campaign
        Route::group(['prefix' => 'campaign/', 'as' => 'campaign.'], function (){

            Route::get('', [CampaignController::class, 'index'])->name('index');
            Route::get('add', [CampaignController::class, 'add'])->name('add');
            Route::post('insert', [CampaignController::class, 'insert'])->name('insert');
            Route::get('{campaign_id}', [CampaignController::class, 'view'])->name('view');

            Route::group(['prefix' => '{campaign_id}/card/', 'as' => 'card.'], function (){
                Route::get('index', [CampaignCardController::class, 'index'])->name('index');
                Route::get('add', [CampaignCardController::class, 'add'])->name('add');
                Route::post('insert', [CampaignCardController::class, 'add'])->name('insert');
                Route::get('edit/{id}', [CampaignCardController::class, 'edit'])->name('edit');
                Route::post('edit/{id}', [CampaignCardController::class, 'update'])->name('update');
                Route::get('update/{id}', [CampaignCardController::class, 'update'])->name('delete');
            });

            Route::group(['prefix' => '{campaign_id}/participant/', 'as' => 'participant.'], function (){

                Route::get('index', [ParticipantController::class, 'index'])->name('index');
                Route::get('invite', [ParticipantController::class, 'inviteSearch'])->name('invite-search');
                Route::get('invite/{participant_id}', [ParticipantController::class, 'invite'])->name('invite');
                Route::get('view/{participant_id}', [ParticipantController::class, 'view'])->name('view');
                Route::get('change-attempt/{participant_id}', [ParticipantController::class, 'changeAttempt'])->name('change-attempt');
                Route::post('change-attempt/{participant_id}', [ParticipantController::class, 'changeAttemptSave'])->name('change-attempt-save');
                Route::get('dismiss/{participant_id}', [ParticipantController::class, 'dismiss'])->name('dismiss');
                Route::get('vote-reset/{participant_id}', [ParticipantController::class, 'voteReset'])->name('vote-reset');

            });
        });
    });

    #vote
    Route::group(['prefix' => 'vote/', 'as' => 'vote.'], function (){

        Route::get('', [VoteController::class, 'index'])->name('index');
        Route::get('apply', [VoteController::class, 'apply'])->name('apply');
        Route::post('apply', [VoteController::class, 'applyInsert'])->name('apply-insert');
        Route::get('rules/{campaign_code}', [VoteController::class, 'rules'])->name('rules');
        Route::get('now/{campaign_code}', [VoteController::class, 'now'])->name('now');
        Route::post('check/{campaign_code}', [VoteController::class, 'check'])->name('check');
        Route::get('result/{campaign_code}', [VoteController::class, 'result'])->name('result');

    });

    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
