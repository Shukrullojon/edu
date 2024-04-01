<?php

use App\Http\Controllers\CourceController;
use App\Http\Controllers\DayTypeController;
use App\Http\Controllers\FilialController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::post('/reset', '\App\Http\Controllers\UserController@reset')->name('userReset');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::group(['prefix' => 'home', 'namespace' => '\App\Http\Controllers'], function () {
        Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');
    });

    Route::resource('roles', RoleController::class);
    Route::resource('position', \App\Http\Controllers\PositionController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('filial', FilialController::class);
    Route::resource('room', RoomController::class);
    Route::resource('roomtask', RoomTaskController::class);
    Route::resource('room-task', RoomTaskController::class);
    Route::resource('task-room', RoomTaskController::class);
    Route::resource('cource', CourceController::class);
    Route::resource('task', \App\Http\Controllers\TaskController::class);
    Route::group(['prefix' => 'task', 'namespace' => '\App\Http\Controllers'], function () {
        Route::get('user/list', 'TaskController@list')->name('task_list');
        Route::delete('/task/finish/{id}','TaskController@finish')->name('task_finish');
    });

    Route::resource('pc', \App\Http\Controllers\PCController::class);
    Route::resource('pt', \App\Http\Controllers\PTController::class);
    Route::resource('event', \App\Http\Controllers\EventController::class);
    Route::resource('additional', \App\Http\Controllers\AdditionalController::class);
    Route::resource('direction', \App\Http\Controllers\DirectionController::class);
    Route::resource('lang', \App\Http\Controllers\LangController::class);
    Route::resource('book', \App\Http\Controllers\BookController::class);
    Route::resource('day', \App\Http\Controllers\DayController::class);
    Route::group(['prefix' => 'book', 'namespace' => '\App\Http\Controllers'], function () {
        Route::patch('/count/add', 'BookController@bookcount')->name('bookCountAdd');
        Route::any('/give/student', 'BookController@give')->name('bookGive');
    });

    Route::get('testresults/all', '\App\Http\Controllers\PTController@results')->name('ptResult');
    Route::get('/start/time', '\App\Http\Controllers\UserController@start')->name('startTime');
    Route::get('/end/time', '\App\Http\Controllers\UserController@end')->name('endTime');

    Route::resource('users', UserController::class);
    Route::group(['prefix' => 'user', 'namespace' => '\App\Http\Controllers'], function () {
        Route::get('/user/change', 'UserController@change')->name('userchange');
        Route::patch('/user/change/update', 'UserController@changeupdate')->name('userchangeupdate');
    });

    Route::group(['prefix' => 'payment', 'namespace' => '\App\Http\Controllers'], function () {
        Route::get('/nopay', 'PaymentController@nopay')->name('nopay');
        Route::get('/pay', 'PaymentController@pay')->name('pay');
        Route::get('/later', 'PaymentController@later')->name('later');
        Route::patch('/payupdate', 'PaymentController@payupdate')->name('paymentPayUpdate');
        Route::get('/report', 'PaymentController@report')->name('report');
    });

    Route::resource('payed', \App\Http\Controllers\PayController::class);

    Route::resource('day-type', DayTypeController::class);

    Route::resource('group', GroupController::class);
    Route::group(['prefix' => 'group', 'namespace' => '\App\Http\Controllers'], function () {
        Route::post('detailstore', 'GroupController@detailstore')->name('groupdetailstore');
        Route::post('studentstore', 'GroupController@studentstore')->name('groupstudentstore');
        Route::patch('/detail/update/{id}', 'GroupController@detailupdate')->name('groupdetailupdate');
        Route::any('add/{id}', 'GroupController@add')->name('groupStdAdd');
        Route::any('detail/{id}', 'GroupController@detail')->name('groupDetail');
        Route::post('change', 'GroupController@find')->name('findTeacher');
    });

    Route::get('/search', '\App\Http\Controllers\StudentController@search')->name('search');
    Route::group(['prefix' => 'student', 'namespace' => '\App\Http\Controllers'], function () {
        Route::get('index','StudentController@index')->name('studentIndex');
        Route::get('/create/{status?}', 'StudentController@create')->name('studentCreate');

        /*Student statuses*/
        Route::get('/archive', 'StudentController@archive')->name('studentArchive');
        Route::get('/accept', 'StudentController@accept')->name('studentAccept');
        Route::get('/first', 'StudentController@first')->name('studentFirst');
        Route::get('/left', 'StudentController@left')->name('studentLeft');
        Route::get('/waiting', 'StudentController@waiting')->name('studentWaiting');
        Route::get('/active', 'StudentController@active')->name('studentActive');
        Route::get('/froze', 'StudentController@froze')->name('studentFroze');
        /*End Student Statuses*/

        Route::get('/doc/{id}', 'StudentController@doc')->name('studentDocDownload');
        Route::get('/doc/delete/{id}', 'StudentController@doc_delete')->name('studentDocDelete');
        Route::post('/store', 'StudentController@store')->name('studentStore');
        Route::get('/edit/{id}', 'StudentController@edit')->name('studentEdit');
        Route::patch('/update/{id}', 'StudentController@update')->name('studentUpdate');
        Route::get('/show/{id}', 'StudentController@show')->name('studentShow');
        Route::get('/work', 'StudentController@work')->name('studentWork');
        Route::get('/start/{id}', 'StudentController@start')->name('studentPTStart');
        Route::post('/work/store', 'StudentController@workStore')->name('studentWorkStore');
        Route::get('/work/result/{id}', 'StudentController@result')->name('studentWorkResult');
        Route::get('/pay', 'StudentController@pay')->name('studentPay');
        Route::get('/nopay', 'StudentController@nopay')->name('studentNoPay');
        Route::patch('/payupdate', 'StudentController@payupdate')->name('studentPayUpdate');
        Route::get('/studentNoattend', 'StudentController@noattend')->name('studentNoattend');
        Route::patch('/noattendupdate/{id}', 'StudentController@noattendupdate')->name('noattendupdate');
        Route::patch('/updategroup/{id}', 'StudentController@updategroup')->name('updateGroup');
        Route::post('/add/group', 'StudentController@addGroup')->name('studentAddGroup');
        Route::post('/add/new-group', 'StudentController@addNewGroup')->name('studentAddNewGroup');

    });
    Route::get('/attendance/index', '\App\Http\Controllers\AttendanceController@index')->name('attendanceIndex');
    Route::post('/aaa/change', '\App\Http\Controllers\AttendanceController@optional_change')->name("attendanceOptionalChange");
    Route::group(['prefix' => 'teacher', 'namespace' => '\App\Http\Controllers'], function () {
        Route::get('/schedule', 'TeacherController@schedule')->name('teacherSchedule');
        Route::get('/schedule/edit/{id}', 'TeacherController@scheduleedit')->name('teacherScheduleEdit');
        Route::patch('/schedule/update/{id}', 'TeacherController@update')->name('teacherScheduleUpdate');
    });

    Route::group(['prefix' => 'salary', 'namespace' => '\App\Http\Controllers'], function () {
        Route::get('/active', 'SalaryController@active')->name('salaryActive');
        Route::get('/archive', 'SalaryController@archive')->name('salaryArchive');
        Route::patch('/salary/update/{id}', 'SalaryController@update')->name('salaryUpdate');
        Route::get('/show/{id}', 'SalaryController@show')->name('salaryShow');
        Route::get('/list', 'SalaryController@list')->name('salaryList');
        Route::get('/list/show/{date}', 'SalaryController@listShow')->name('salaryListShow');
    });
});
