<?php

//サブドメイン対応
//Route::group(['domain' => '{organization}.myapp.com'], function () {

//});
//TODO: サブドメイン対応ができるまでorganizationのmiddlewareで対応
Route::group(['middleware' => 'customer'], function () {
    /*
     * 管理者
     */
    Route::prefix('admin')->namespace('Admin')->group(function () {
        Route::get('', 'LoginController@index')->name('admin-login');
        Route::post('', 'LoginController@store');
        Route::get('reminder', 'ReminderController@index')->name('admin-reminder');
        Route::post('reminder', 'ReminderController@handle')->name('admin-reminder-token');
        Route::post('reminder/doresetpw', 'ReminderController@doResetpw')->name('admin-resetpw-post');
        Route::get('reminder/success', 'ReminderController@resetSuccess')->name('admin-reset-success');
        Route::get('reminder/{email_key}', 'ReminderController@resetpw');
        
        /*
         * ログインしていないと閲覧不可
         */
        Route::group(['middleware' => 'cf-admin-auth'], function () {
            Route::get('home', 'HomeController@index')->name('admin-home');
            Route::get('test', 'HomeController@create_layout')->name('');
            Route::get('users', 'UserController@index')->name('admin-users');
            Route::get('users/create', 'UserController@create')->name('admin-users-create');
            Route::get('info', 'InformationController@index')->name('admin-info-index');
            Route::get('info/create', 'InformationController@showCreate')->name('admin-info-create');
            Route::post('info/create', 'InformationController@create');
            Route::get('info/{info_id}', 'InformationController@detail')->name('admin-info-detail');
            Route::prefix('users/{user_id}')->group(function () {
                Route::get('dashboard', 'UserController@dashboard')->name('admin-dashboard');
                Route::get('profile', 'UserController@show')->name('admin-users-profile');
                Route::get('edit', 'UserController@edit')->name('admin-edit');
                Route::get('medical_karte', 'MedicalKarteController@index')->name('');
                Route::get('recovery', 'RecoveryController@index')->name('');
                Route::get('medical_karte', 'MedicalKarteController@index')->name('');
                Route::get('medical_karte/{medical_karte_id}', 'MedicalKarteController@show')->name('');
                Route::get('medical_karte/create', 'MedicalKarteController@create')->name('');
                Route::get('medical_karte/{medical_karte_id}/edit', 'MedicalKarteController@edit')->name('');
                Route::get('enquete', 'UserEnqueteController@index')->name('');
                Route::get('enquete/{enquete_id}', 'UserEnqueteController@show')->name('');
                Route::get('enquete/create', 'UserEnqueteController@create')->name('');
                Route::get('enquete/{enquete_id}/edit', 'UserEnqueteController@edit')->name('');
                Route::prefix('soap')->group(function () {
                    Route::get('subjective', 'SubjectiveController@index')->name('');
                    Route::get('subjective/{subjective_id}', 'SubjectiveController@show')->name('');
                    Route::get('subjective/create', 'SubjectiveController@create')->name('');
                    Route::get('subjective/{subjective_id}/edit', 'SubjectiveController@edit')->name('');
                    Route::get('objective', 'ObjectiveController@index')->name('');
                    Route::get('objective/{objective_id}', 'ObjectiveController@show')->name('');
                    Route::get('objective/create', 'ObjectiveController@create')->name('');
                    Route::get('objective/{objective_id}/edit', 'ObjectiveController@edit')->name('');
                    Route::get('assessment', 'AssessmentController@index')->name('');
                    Route::get('assessment/{assessment_id}', 'AssessmentController@show')->name('');
                    Route::get('assessment/create', 'AssessmentController@create')->name('');
                    Route::get('assessment/{assessment_id}/edit', 'AssessmentController@edit')->name('');
                    Route::get('plan', 'PlanController@index')->name('');
                    Route::get('plan/{plan_id}', 'PlanController@show')->name('');
                    Route::get('plan/create', 'PlanController@create')->name('');
                    Route::get('plan/{plan_id}/edit', 'PlanController@edit')->name('');
                    Route::get('plan_execute', 'PlanExecuteController@index')->name('admin-plan-execute-index');
                    Route::get('plan_execute/search', 'PlanExecuteController@search')->name('admin-plan-execute-search');
                    Route::post('plan_execute/copy', 'PlanExecuteController@copy')->name('admin-plan-execute-copy');
                    Route::get('plan_execute/delete/{plan_execute_id}', 'PlanExecuteController@delete')->name('admin-plan-execute-delete');
                    Route::get('plan_execute/{plan_execute_id}', 'PlanExecuteController@show')->name('');
                    Route::get('plan_execute/{plan_execute_id}', 'PlanExecuteController@show')->name('plan-execute-show');
                    Route::get('plan_execute/create', 'PlanExecuteController@create')->name('admin-plan-execute-create');
                    Route::post('plan_execute/do_create', 'PlanExecuteController@doCreate')->name('admin-plan-execute-docreate');
                    Route::get('plan_execute/{plan_execute_id}/edit', 'PlanExecuteController@edit')->name('');
                });
            });
            Route::get('objective_master', 'ObjectiveMasterController@index')->name('');
            Route::get('objective_master/{objective_master_id}', 'ObjectiveMasterController@show')->name('');
            Route::get('objective_master/create', 'ObjectiveMasterController@create')->name('');
            Route::get('objective_master/{objective_master_id}/edit', 'ObjectiveMasterController@edit')->name('');
            Route::get('process_injuries', 'ProcessInjuryController@index')->name('');
            Route::get('process_injuries/{process_injury_id}', 'ProcessInjuryController@show')->name('');
            Route::get('process_injuries/create', 'ProcessInjuryController@create')->name('');
            Route::get('process_injuries/{process_injury_id}/edit', 'ProcessInjuryController@edit')->name('');
            Route::get('ticket', 'TicketController@index')->name('');
            Route::get('ticket/{ticket_id}', 'TicketController@show')->name('');
            Route::get('ticket/create', 'TicketController@create')->name('');
            Route::get('ticket/{ticket_id}/edit', 'TicketController@edit')->name('');
            Route::get('exercise', 'ExerciseController@index')->name('');
            Route::get('exercise/{exercise_id}', 'ExerciseController@show')->name('');
            Route::get('exercise/create', 'ExerciseController@create')->name('');
            Route::get('exercise/{exercise_id}/edit', 'ExerciseController@edit')->name('');
            Route::get('exercise_group', 'ExerciseGroupController@index')->name('');
            Route::get('exercise_group/{exercise_group_id}', 'ExerciseGroupController@show')->name('');
            Route::get('exercise_group/create', 'ExerciseGroupController@create')->name('');
            Route::get('exercise_group/{exercise_group_id}/edit', 'ExerciseGroupController@edit')->name('');
            Route::get('message', 'MessageController@index')->name('');
            Route::get('message/{message_id}', 'MessageController@show')->name('');
            Route::get('message/create', 'MessageController@create')->name('');
            Route::get('message/{message_id}/edit', 'MessageController@edit')->name('');
            Route::get('user_entry', 'UserEntryController@index')->name('');
            Route::get('user_entry/create', 'UserEntryController@create')->name('');
            Route::get('permit_ip', 'PermitIpController@index')->name('');
            Route::get('permit_ip/create', 'PermitIpController@create')->name('');
        });
    });
});