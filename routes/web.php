<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Majors\MajorsController;
use App\Http\Controllers\Courses\CoursesController;
use App\Http\Controllers\Lops\Lopcontroller;
use App\Http\Controllers\Student\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::name('login.')->group(function() {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('form');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('proces');
});


Route::get('admin-manager/get-datatables', [AdminController::class, 'getDataTables'])
    ->name('get_datatables');
Route::resource('admin-manager', AdminController::class);
Route::get('teacher-manager/get-datatables1', [TeacherController::class, 'getDataTables1'])
    ->name('get_datatables1');
Route::resource('teacher-manager', TeacherController::class);
Route::get('majors-manager/get-datatables2', [MajorsController::class, 'getDataTables2'])
    ->name('get_datatables2');
Route::resource('majors-manager', MajorsController::class);
Route::get('course-manager/get-datatables', [CoursesController::class, 'getDataTables'])
    ->name('course_get_datatables');
Route::resource('course-manager', CoursesController::class);
Route::get('lop-manager/get-datatables', [LopController::class, 'getDataTables'])
    ->name('lop_get_datatables');
Route::resource('lop-manager', LopController::class);
Route::get('student-manager/get-datatables', [StudentController::class, 'getDataTables'])
    ->name('student_get_datatables');
Route::resource('student-manager', StudentController::class);
