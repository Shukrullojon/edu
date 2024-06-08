<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'profile']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
    Route::resource('filial', \App\Http\Controllers\FilialController::class);
    Route::resource('room', \App\Http\Controllers\RoomController::class);
    Route::resource('cource', \App\Http\Controllers\CourceController::class);
    Route::resource('direction', \App\Http\Controllers\DirectionController::class);
    Route::resource('lang', \App\Http\Controllers\LangController::class);
    Route::resource('day', \App\Http\Controllers\DayController::class);
    Route::resource('student', \App\Http\Controllers\StudentController::class);
    Route::resource('staff', \App\Http\Controllers\StaffController::class);
    Route::resource('group', \App\Http\Controllers\GroupController::class);
    Route::get("group/studentDestroy/{id}",[\App\Http\Controllers\GroupController::class,'studentDestroy'])->name("group.studentDestroy");
    Route::get("group/teacherDestroy/{id}",[\App\Http\Controllers\GroupController::class,'teacherDestroy'])->name("group.teacherDestroy");
    Route::get("group/create_student/{id}",[\App\Http\Controllers\GroupController::class,'createStudent'])->name("group.create_student");
    Route::post("group/store_student/{id}",[\App\Http\Controllers\GroupController::class,'storeStudent'])->name("group.store_student");
    Route::get("group/create_teacher/{id}",[\App\Http\Controllers\GroupController::class,'createTeacher'])->name("group.create_teacher");
    Route::post("group/store_teacher/{id}",[\App\Http\Controllers\GroupController::class,'storeTeacher'])->name("group.store_teacher");
    Route::get("group/edit_schedule/{id}",[\App\Http\Controllers\GroupController::class,'editSchedule'])->name("group.edit_schedule");
    Route::post("group/update_schedule/{id}",[\App\Http\Controllers\GroupController::class,'updateSchedule'])->name("group.update_schedule");

    Route::resource('attendance', \App\Http\Controllers\AttendanceController::class);
    Route::post("attendance/change",[\App\Http\Controllers\AttendanceController::class,'attendanceChange'])->name("attendanceChange");
    Route::get("attend/noattend",[\App\Http\Controllers\AttendanceController::class,'noattend'])->name("attend.noattend");
});
