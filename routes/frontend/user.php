<?php

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Frontend\User\CampaignController;
use App\Http\Controllers\Frontend\User\VoteController;
use App\Http\Controllers\Frontend\User\CampaignCardController;
use App\Http\Controllers\Frontend\User\ParticipantController;
use App\Http\Controllers\Frontend\User\Cv\EventController;
use App\Http\Controllers\Frontend\User\Library\Admin\AdminBookController;
use App\Http\Controllers\Frontend\User\Library\MainController;
use App\Http\Controllers\Frontend\User\Library\Admin\AdminPublisherController;
use App\Http\Controllers\Frontend\User\Library\Admin\AdminAuthorController;
use App\Http\Controllers\Frontend\User\Library\Admin\AdminGroupController;
use App\Http\Controllers\Frontend\User\Library\BorrowController;
use App\Http\Controllers\Frontend\User\Kehadiran\KehadiaranController;
use App\Http\Controllers\Frontend\User\Kehadiran\ClassroomTeacherController;
use App\Http\Controllers\Frontend\User\Library\Admin\AdminSettingController;
use App\Http\Controllers\Frontend\User\Library\Admin\VisitorController;
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


    Route::group([
        'prefix' => 'poll/',
        'middleware' => 'permission:poll_can'
    ], function (){

        #for moderator only
        Route::group([
            'middleware' => 'permission:poll_admin'
        ], function (){

            #campaign
            Route::group(['prefix' => 'campaign/', 'as' => 'campaign.'], function (){

                Route::get('', [CampaignController::class, 'index'])->name('index');
                Route::get('add', [CampaignController::class, 'add'])->name('add');
                Route::post('insert', [CampaignController::class, 'insert'])->name('insert');
                Route::get('{campaign_id}', [CampaignController::class, 'view'])->name('view');
                Route::get('{campaign_id}/edit', [CampaignController::class, 'edit'])->name('edit');
                Route::post('{campaign_id}/edit', [CampaignController::class, 'update'])->name('update');
                Route::get('{campaign_id}/pause', [CampaignController::class, 'pause'])->name('pause');
                Route::get('{campaign_id}/start', [CampaignController::class, 'start'])->name('start');
                Route::get('{campaign_id}/stop', [CampaignController::class, 'stop'])->name('stop');

                Route::group(['prefix' => '{campaign_id}/card/', 'as' => 'card.'], function (){
                    Route::get('index', [CampaignCardController::class, 'index'])->name('index');
                    Route::post('insert', [CampaignCardController::class, 'insert'])->name('insert');
                    Route::get('edit/{id}', [CampaignCardController::class, 'edit'])->name('edit');
                    Route::post('edit/{id}', [CampaignCardController::class, 'update'])->name('update');
                    Route::get('update/{id}', [CampaignCardController::class, 'delete'])->name('delete');
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
                    Route::get('approve/{participant_id}', [ParticipantController::class, 'approve'])->name('approve');
                    Route::get('decline/{participant_id}', [ParticipantController::class, 'decline'])->name('decline');

                });
            });
        });
        #vote
        Route::group(['prefix' => 'vote/', 'as' => 'vote.'], function (){

            Route::get('', [VoteController::class, 'index'])->name('index');
            Route::get('apply-search', [VoteController::class, 'apply'])->name('apply');
            Route::get('shuffleCard/{campaign_code}', [VoteController::class, 'shuffleCard'])->name('shuffle-card');
            Route::get('apply/{campaign_code}/true', [VoteController::class, 'applyInsert'])->name('apply-insert');
            Route::get('rules/{campaign_code}', [VoteController::class, 'rules'])->name('rules');
            Route::get('now/{campaign_code}', [VoteController::class, 'now'])->name('now');
            Route::post('check/{campaign_code}', [VoteController::class, 'check'])->name('check');
            Route::get('result/{campaign_code}/{uc}', [VoteController::class, 'result'])->name('result');
            Route::get('result-full/{campaign_code}/', [VoteController::class, 'resultFull'])->name('result-full');

        });

        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::group([
        'prefix' => 'cv/',
        'as' => 'cv.',
        'middleware' => 'permission:cv_can'
    ], function (){

        Route::group(['prefix' => 'event/', 'as' => 'event.'], function (){

            Route::group([
                'middleware' => 'permission:cv_guard'
            ], function (){

                Route::get('', [EventController::class, 'index'])->name('index');
                Route::get('view/{id}', [EventController::class, 'view'])->name('view');
                Route::get('export/{id}', [EventController::class, 'export'])->name('export');
                Route::get('add', [EventController::class, 'add'])->name('add');
                Route::post('add', [EventController::class, 'insert'])->name('insert');
                Route::get('edit/{id}', [EventController::class, 'edit'])->name('edit');
                Route::post('edit/{id}', [EventController::class, 'update'])->name('update');
                Route::get('activate/{id}', [EventController::class, 'activate'])->name('activate');
                Route::get('deactivate/{id}', [EventController::class, 'deactivate'])->name('deactivate');
                Route::get('regenerate/{id}', [EventController::class, 'regenerate'])->name('regenerate');
                Route::get('landing/{id}', [EventController::class, 'landing'])->name('landing');
                Route::get('checkin-last/{id}', [EventController::class, 'checkLast'])->name('checkin-last');

            });

            #for checkin
            Route::get('checkin-scan', [EventController::class, 'checkinScan'])->name('checkin-scan');

            Route::get('checkin-manual', [EventController::class, 'checkinManual'])->name('checkin-manual');
            Route::post('checkin-manual', [EventController::class, 'checkinManualInsert'])->name('checkin-manual-insert');


            Route::get('checkin/{token}', [EventController::class, 'checkin'])->name('checkin');

            Route::post('checkin-new/{token}', [EventController::class, 'checkinNew'])->name('checkin-new');
            Route::post('checkin-update/{token}', [EventController::class, 'checkinUpdate'])->name('checkin-update');

            Route::get('checkin-done/{id}', [EventController::class, 'checkinDone'])->name('checkin-done');
            Route::get('history/', [EventController::class, 'history'])->name('history');

            #ajax


        });

    });

    //e-kehadiran

    Route::group([
        'as' => 'kehadiran.',
        'prefix' => 'kehadiran/'
    ], function (){
        Route::get('test', [KehadiaranController::class, 'index'])->name('index');

        Route::group([
            'prefix' => 'classroom-teacher/',
            'as' => 'ct.'
        ], function (){

            Route::get('', [ClassroomTeacherController::class, 'index'])->name('index');
            Route::get('add-class', [ClassroomTeacherController::class, 'addClass'])->name('add-class');

            Route::get('view-today-attendance/{class_id}', [ClassroomTeacherController::class, 'viewTodayAttendance'])->name('view-today-attendance');
            Route::get('student-list/{class_id}', [ClassroomTeacherController::class, 'studentList'])->name('student-list');
            Route::get('print-student-card/{student_id}', [ClassroomTeacherController::class, 'printStudentCard'])->name('print-student-card');
            Route::get('print-student-card-v2/{student_id}', [ClassroomTeacherController::class, 'printStudentCard2'])->name('print-student-card-v2');

            Route::get('scan', [ClassroomTeacherController::class, 'scan'])->name('scan');
            Route::get('scan-check/{student_id}', [ClassroomTeacherController::class, 'scanCheck'])->name('scan-check');
            Route::post('scan-check/{student_id}', [ClassroomTeacherController::class, 'scanInsert'])->name('scan-insert');
            Route::get('scan-complete/{student_id}', [ClassroomTeacherController::class, 'scanComplete'])->name('scan-complete');

        });
    });


    //library

    Route::group([
        'as' => 'library.',
        'prefix' => 'library/',
    ], function (){

        Route::group([], function (){
            Route::get('', [MainController::class, 'index'])->name('index');
        });

        Route::group([
            'as' => 'borrow.',
            'prefix' => 'borrow/'
        ], function (){
            Route::get('', [BorrowController::class, 'borrowBook'])->name('borrow');
            Route::get('return/', [BorrowController::class, 'returnBook'])->name('return');
            Route::get('late/', [BorrowController::class, 'late'])->name('late');

        });

        #admin library
        Route::group([
            'as' => 'admin.',
            'prefix' => 'admin/'
        ], function (){
            Route::group([
                'as' => 'book.',
                'prefix' => 'book/'
            ], function (){
                Route::get('', [AdminBookController::class, 'index'])->name('index');
                Route::get('view/{id}', [AdminBookController::class, 'view'])->name('view');
                Route::get('add/', [AdminBookController::class, 'add'])->name('add');
                Route::post('add/', [AdminBookController::class, 'insert'])->name('insert');

                #ajax
                Route::get('check-title', [AdminBookController::class, 'checkTitle'])->name('check-title');
                Route::get('auto-fill', [AdminBookController::class, 'autoFill'])->name('auto-fill');


                Route::group([
                    'as' => 'group.',
                    'prefix' => 'group/'
                ], function (){
                    Route::get('', [AdminBookController::class, 'index'])->name('index');
                });

                Route::group([
                    'as' => 'author.',
                    'prefix' => 'author/'
                ], function (){
                    Route::get('', [AdminAuthorController::class, 'index'])->name('index');
                });

                Route::group([
                    'as' => 'publisher.',
                    'prefix' => 'publisher/'
                ], function (){
                    Route::get('', [AdminPublisherController::class, 'index'])->name('index');
                });

            });

            Route::group([
                'as' => 'setting.',
                'prefix' => 'setting/',
            ], function (){
                Route::get('', [AdminSettingController::class, 'index'])->name('index');
                Route::post('', [AdminSettingController::class, 'save'])->name('save');
            });
        });

        Route::group([
            'as' => 'visitor.',
            'prefix' => 'visitor/',
        ], function (){
            Route::get('today/', [VisitorController::class, 'today'])->name('today');
        });
    });

});
