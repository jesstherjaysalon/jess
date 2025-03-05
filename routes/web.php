<?php


use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/v1/easy',[TransactionController::class,'getAppointments']);
Route::get('/v1/moderate',[TransactionController::class,'getAppointmentsData']);
Route::get('/v1/challenging',[TransactionController::class,'getAppointmentsChallenging']);
Route::get('/v1/difficult',[TransactionController::class,'getAppDifficult']);

