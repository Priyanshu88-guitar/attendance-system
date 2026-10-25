<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('attendances', AttendanceController::class);
});