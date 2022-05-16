<?php

use App\Http\Controllers\ListenedClassController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\StudentController;
use \App\Http\Controllers\Api\LectureController;
use \App\Http\Controllers\Api\SchoolClassController;
use \App\Http\Controllers\Api\AcademicPlanController;
use \App\Http\Controllers\Api\ListenedLectureController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('students', [StudentController::class, 'store']);
Route::get('/students', [StudentController::class, 'index']);
Route::get('student/{id}', [StudentController::class, 'show']);
Route::put('students/{id}', [StudentController::class, 'update']);
Route::delete('students/{id}', [StudentController::class, 'destroy']);

Route::post('/lectures', [LectureController::class, 'store']);
Route::get('/lectures', [LectureController::class, 'index']);
Route::put('/lectures/{id}', [LectureController::class, 'update']);
Route::delete('/lectures/{id}', [LectureController::class, 'destroy']);
Route::get('/lecture/{id}', [LectureController::class, 'show']);

Route::post('/schoolClass', [SchoolClassController::class, 'store']);
Route::get('/schoolClass', [SchoolClassController::class, 'index']);
Route::get('/schoolClass/{id}', [SchoolClassController::class, 'show']);
Route::get('/schoolClass/{id}/academic_plan', [SchoolClassController::class, 'academicPlan']);
Route::put('/schoolClass/{id}', [SchoolClassController::class, 'update']);
Route::delete('schoolClass/{id}', [SchoolClassController::class, 'destroy']);

Route::post('AcademicPlan', [AcademicPlanController::class, 'store']);
Route::get('/AcademicPlan/{id}', [AcademicPlanController::class, 'show']);
Route::put('AcademicPlan/{id}', [AcademicPlanController::class, 'update']);

Route::post('Listenedlectures', [ListenedLectureController::class, 'store']);
Route::post('ListenedClasses', [ListenedClassController::class, 'store']);



