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
use App\Http\Controllers\Frontend\User\Library\VisitorController;
use App\Http\Controllers\Frontend\User\Student\StudentMainController;
use App\Http\Controllers\Frontend\User\Library\Admin\AdminReportController;
use App\Http\Controllers\Frontend\User\Portal\PortalController;
use App\Http\Controllers\Frontend\User\Portal\SmkalController;
use App\Http\Controllers\Frontend\User\Library\BookingController;
use App\Http\Controllers\Frontend\User\Portal\AnnouncementController;
use App\Http\Controllers\Frontend\User\Portal\DocumentController;
/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group(['as' => 'user.', 'middleware' => ['auth', 'checkLibSelfLogin', 'password.expires', config('boilerplate.access.middleware.verified')]],
    function () {
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
            Route::get('result-all/{campaign_code}/', [VoteController::class, 'resultAll'])->name('result-all');


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

    Route::group([
        'prefix' => 'manage-portal/',
        'as' => 'portal.',
//        'middleware' => 'permission:portal_can'
    ], function (){

        Route::get('', [PortalController::class, 'index'])->name('index');
        Route::get('/{group}', [PortalController::class, 'group'])->name('group');

        Route::get('edit/{page_id}', [PortalController::class, 'edit'])->name('edit');

        Route::group([
            'prefix' => 'editing/{page_id}/',
            'as' => 'edit.'
        ], function (){

            Route::get('{text_id}/', [PortalController::class, 'editText'])->name('text');
            Route::post('{text_id}/', [PortalController::class, 'updateText'])->name('update-text');

            Route::get('directory/add', [PortalController::class, 'addDirectory'])->name('add-directory');
            Route::post('directory/add', [PortalController::class, 'insertDirectory'])->name('insert-directory');

            Route::get('editDirectory/{directory_id}/', [PortalController::class, 'editDirectory'])->name('edit-directory');
            Route::post('editDirectory/{directory_id}/', [PortalController::class, 'updateDirectory'])->name('update-directory');

            Route::get('delete-directory/{directory_id}/', [PortalController::class, 'editDirectory'])->name('delete-directory');


        });

        Route::group([
            'prefix' => 'announcement/',
            'as' => 'announcement.'
        ], function (){
            Route::get('index', [AnnouncementController::class, 'index'])->name('index');
            Route::get('view/{id}/', [AnnouncementController::class, 'view'])->name('view');
            Route::get('create/', [AnnouncementController::class, 'create'])->name('create');
            Route::post('create/', [AnnouncementController::class, 'insert'])->name('insert');
            Route::get('edit/{id}', [AnnouncementController::class, 'edit'])->name('edit');
            Route::post('edit/{id}', [AnnouncementController::class, 'update'])->name('update');
            Route::get('delete/{id}', [AnnouncementController::class, 'delete'])->name('delete');

        });

        Route::group([
            'prefix' => 'document/',
            'as' => 'document.'
        ], function (){
            Route::get('index', [DocumentController::class, 'index'])->name('index');
            Route::get('view/{id}/', [DocumentController::class, 'view'])->name('view');
            Route::get('create/', [DocumentController::class, 'create'])->name('create');
            Route::post('create/', [DocumentController::class, 'insert'])->name('insert');
            Route::get('edit/{id}', [DocumentController::class, 'edit'])->name('edit');
            Route::post('edit/{id}', [DocumentController::class, 'update'])->name('update');
            Route::get('delete/{id}', [DocumentController::class, 'delete'])->name('delete');

        });

//        Route::get('/', [PortalController::class, 'home'])->name('home');
//        Route::post('/', [PortalController::class, 'homeUpdate'])->name('home-update');


//        Route::group([
//            'prefix' => 'smkal/',
//            'as' => 'smkal.'
//        ], function (){
//
//            Route::get('pengenalan/', [SmkalController::class, 'pengenalan'])->name('pengenalan');
//            Route::post('pengenalan/', [SmkalController::class, 'pengenalanUpdate'])->name('pengenalan-update');
//
//            Route::get('pengetua/', [SmkalController::class, 'pengetua'])->name('pengetua');
//            Route::post('pengetua/', [SmkalController::class, 'pengetuaUpdate'])->name('pengetua-udate');
//
//            Route::get('organisasi', [SmkalController::class, 'organisasi'])->name('organisasi');
//            Route::post('organisasi', [SmkalController::class, 'organisasiUpdate'])->name('organisasi-update');
//
//            Route::get('visi/', [SmkalController::class, 'pengetua'])->name('visi');
//            Route::post('visi/', [SmkalController::class, 'pengetuaUpdate'])->name('visi-update');
//
//
//
//        });

    });

    //e-kehadiran
    Route::group([
        'as' => 'student.',
        'prefix' => 'student/'
    ], function (){

        Route::get('', [StudentMainController::class, 'index'])->name('index');

        Route::get('add/', [StudentMainController::class, 'add'])->name('add');
        Route::post('add/', [StudentMainController::class, 'insert'])->name('insert');

        Route::get('edit/{student_id}', [StudentMainController::class, 'edit'])->name('edit');
        Route::post('edit/{student_id}', [StudentMainController::class, 'update'])->name('update');

        Route::get('import', [StudentMainController::class, 'import'])->name('import');
        Route::post('import', [StudentMainController::class, 'upload'])->name('upload');



    });

    Route::group([
        'as' => 'kehadiran.',
        'prefix' => 'kehadiran/'
    ], function (){

        Route::group([

        ], function (){
            Route::get('', [KehadiaranController::class, 'index'])->name('index');
            Route::get('view/{id}', [KehadiaranController::class, 'view'])->name('view');
            Route::get('create/', [KehadiaranController::class, 'create'])->name('create');
            Route::post('create/', [KehadiaranController::class, 'insert'])->name('insert');
            Route::get('delete/{id}', [KehadiaranController::class, 'delete'])->name('delete');

            Route::get('checkin/{id}', [KehadiaranController::class, 'checkin'])->name('checkin');
            Route::get('checkin-qr/{id}', [KehadiaranController::class, 'checkinQr'])->name('checkin-qr');
            Route::get('checkin-qr-check/{id}', [KehadiaranController::class, 'checkinQrCheck'])->name('checkin-qr-check');

            Route::get('checkin-insert/{id}', [KehadiaranController::class, 'checkinInsert'])->name('checkin-insert');
        });

        Route::group([
            'prefix' => 'classroom-teacher/',
            'as' => 'ct.'
        ], function (){

            Route::get('', [ClassroomTeacherController::class, 'index'])->name('index');
            Route::get('add-class', [ClassroomTeacherController::class, 'addClass'])->name('add-class');
            Route::post('add-class', [ClassroomTeacherController::class, 'insertClass'])->name('insert-class');

            Route::get('view-today-attendance/{class_id}', [ClassroomTeacherController::class, 'viewTodayAttendance'])->name('view-today-attendance');
            Route::get('student-list/{class_id}', [ClassroomTeacherController::class, 'studentList'])->name('student-list');
            Route::get('print-student-card/{student_id}', [ClassroomTeacherController::class, 'printStudentCard'])->name('print-student-card');
            Route::get('print-student-card-v2/{student_id}', [ClassroomTeacherController::class, 'printStudentCard2'])->name('print-student-card-v2');

            Route::get('today/', [ClassroomTeacherController::class, 'today'])->name('today');
            Route::get('today-generate/{class_id}', [ClassroomTeacherController::class, 'todayGenerate'])->name('today-generate');


            Route::get('scan', [ClassroomTeacherController::class, 'scan'])->name('scan');
            Route::get('scan-check', [ClassroomTeacherController::class, 'scanCheck'])->name('scan-check');
            Route::post('scan-check/{student_id}', [ClassroomTeacherController::class, 'scanInsert'])->name('scan-insert');
            Route::get('scan-complete/{student_id}', [ClassroomTeacherController::class, 'scanComplete'])->name('scan-complete');

        });
    });


    //library

    Route::group([
        'as' => 'library.',
        'prefix' => 'library/',
        'middleware' => 'permission:lib_can'
    ], function (){


        #for pengawas
        Route::get('pengawas-login', [MainController::class, 'prefectLogin'])->name('prefect-login');
        Route::post('pengawas-login', [MainController::class, 'prefectLoginCheck'])->name('prefect-login-check');
        Route::get('pengawas-logout', [MainController::class, 'prefectLogout'])->name('prefect-logout');


        Route::group([
            'middleware' => 'checkPrefects'
        ], function (){
            Route::get('', [MainController::class, 'index'])->name('index');


            Route::group([
                'as' => 'borrow.',
                'prefix' => 'borrow/'
            ], function (){
                Route::get('', [BorrowController::class, 'borrowBook'])->name('borrow');
                Route::post('add-list/', [BorrowController::class, 'borrowAddList'])->name('borrow-add-list');
                Route::get('remove-list/{ic_no}/{book_id}', [BorrowController::class, 'borrowRemoveList'])->name('borrow-remove-list');
                Route::get('submit/{ic_no}/', [BorrowController::class, 'borrowSubmit'])->name('submit');

                Route::get('return/', [BorrowController::class, 'returnBook'])->name('return');
                Route::get('return-submit/{book_id}', [BorrowController::class, 'returnSubmit'])->name('return-submit');
                Route::get('return-fine/{fine_id}', [BorrowController::class, 'returnFine'])->name('return-fine');
                Route::get('fine/', [BorrowController::class, 'fine'])->name('fine');
                Route::get('history/', [BorrowController::class, 'history'])->name('history');
                Route::get('history/view/{id}', [BorrowController::class, 'historyView'])->name('history-view');




                Route::get('late/', [BorrowController::class, 'late'])->name('late');

            });

            Route::group([
                'as' => 'visitor.',
                'prefix' => 'visitor/',
            ], function (){
                Route::get('today/', [VisitorController::class, 'today'])->name('today');
                Route::post('check/', [VisitorController::class, 'check'])->name('check');
                Route::get('manual-checkout/{no_ic}/{staff?}', [VisitorController::class, 'manualCheckout'])->name('manual-checkout');

                Route::get('checkin/', [VisitorController::class, 'checkin'])->name('checkin');

            });


        });

        #admin library
        Route::group([
            'as' => 'admin.',
            'prefix' => 'admin/',
            'middleware' => 'permissions:lib_admin,lib_staff'
        ], function (){
            Route::group([
                'as' => 'book.',
                'prefix' => 'book/'
            ], function (){
                Route::get('', [AdminBookController::class, 'index'])->name('index');
                Route::get('view/{id}', [AdminBookController::class, 'view'])->name('view');
                Route::get('add/', [AdminBookController::class, 'add'])->name('add');
                Route::post('add/', [AdminBookController::class, 'insert'])->name('insert');

                Route::get('edit/{id}', [AdminBookController::class, 'edit'])->name('edit');
                Route::post('edit/{id}', [AdminBookController::class, 'update'])->name('update');
                Route::post('edit-parent/{id}', [AdminBookController::class, 'updateParent'])->name('update-parent');


                Route::get('print-label/', [AdminBookController::class, 'printLabel'])->name('print-label');
                Route::post('print-label/', [AdminBookController::class, 'addPrintLabel'])->name('add-print-label');
                Route::get('print-label-now/', [AdminBookController::class, 'printLabelNow'])->name('print-label-now');
                Route::get('print-label-remove/{id}', [AdminBookController::class, 'printLabelRemove'])->name('print-label-remove');
                Route::get('print-label-remove-all', [AdminBookController::class, 'printLabelRemoveAll'])->name('print-label-remove-all');

                Route::get('print-list/', [AdminBookController::class, 'printList'])->name('print-list');

                #ajax
                Route::get('check-title', [AdminBookController::class, 'checkTitle'])->name('check-title');
                Route::get('auto-fill', [AdminBookController::class, 'autoFill'])->name('auto-fill');


                Route::group([
                    'as' => 'group.',
                    'prefix' => 'group/'
                ], function (){
                    Route::get('', [AdminGroupController::class, 'index'])->name('index');
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
                'as' => 'report.',
                'prefix' => 'report/',
                'middleware' => 'permission:lib_admin'
            ], function (){
                Route::get('', [AdminReportController::class, 'index'])->name('index');
                Route::get('month', [AdminReportController::class, 'monthly'])->name('monthly');
                Route::get('monthly-borrow', [AdminReportController::class, 'monthlyBorrow'])->name('student-top-borrower-monthly');
                Route::get('yearly-borrow', [AdminReportController::class, 'YearlyBorrow'])->name('student-top-borrower-yearly');
                Route::get('staff-monthly-visit', [AdminReportController::class, 'staffMonthlyVisit'])->name('staff-monthly-visit');
                Route::get('staff-yearly-visit', [AdminReportController::class, 'staffYearlyVisit'])->name('staff-yearly-visit');

                Route::get('student-monthly-visit', [AdminReportController::class, 'studentMonthlyVisit'])->name('student-monthly-visit');
                Route::get('student-yearly-visit', [AdminReportController::class, 'studentYearlyVisit'])->name('student-yearly-visit');


            });

            Route::group([
                'as' => 'setting.',
                'prefix' => 'setting/',
                'middleware' => 'permission:lib_admin'
            ], function (){
                Route::get('', [AdminSettingController::class, 'index'])->name('index');
                Route::post('', [AdminSettingController::class, 'save'])->name('save');
                Route::post('add-prefect', [AdminSettingController::class, 'addPrefect'])->name('add-prefect');
                Route::get('remove-prefect/{no_ic}', [AdminSettingController::class, 'removePrefect'])->name('remove-prefect');


            });

            Route::group([
                'as' => 'booking.',
                'prefix' => 'booking/',
            ], function (){

                Route::get('', [BookingController::class, 'index'])->name('index');
                Route::get('create', [BookingController::class, 'create'])->name('create');
                Route::post('create', [BookingController::class, 'insert'])->name('insert');
                Route::get('delete/{id}', [BookingController::class, 'delete'])->name('delete');

                Route::group(['middleware' => 'permission:lib_admin'], function (){

                    Route::get('applicant-list', [BookingController::class, 'applicantList'])->name('applicant-list');
                    Route::get('action/{id}/{status}', [BookingController::class, 'action'])->name('action');
                });

            });
        });

    });

});

Route::group([
    'middleware' => ['auth', 'checkLibNoSelfLogin'],
    'as' => 'user.library.visitor.',
    'prefix' => 'library/visitor/',
], function (){


    Route::get('self/', [VisitorController::class, 'self'])->name('self');
    Route::post('self-check/', [VisitorController::class, 'selfCheck'])->name('self-check');

    Route::get('checkout/', [VisitorController::class, 'checkout'])->name('checkout');
    Route::post('checkout/', [VisitorController::class, 'checkoutCheck'])->name('checkout-check');

});
