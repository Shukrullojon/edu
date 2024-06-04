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

    Route::resource('attendance', \App\Http\Controllers\AttendanceController::class);
    Route::post("attendance/change",[\App\Http\Controllers\AttendanceController::class,'attendanceChange'])->name("attendanceChange");
    Route::get("attend/noattend",[\App\Http\Controllers\AttendanceController::class,'noattend'])->name("attend.noattend");
});
