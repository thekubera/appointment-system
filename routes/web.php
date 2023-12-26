<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ActivityController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/officer', [OfficerController::class, 'index'])->name('officer_index');

Route::post('/officer', [OfficerController::class, 'store'])->name('officer_insert');

Route::post('/editOfficer', [OfficerController::class, 'edit'])->name('update_officer');

Route::post('/getOfficerDetailByID', [OfficerController::class, 'getDetail'])->name('officer_detail');


Route::post('/toggleOfficerStatus', [OfficerController::class, 'toggleStatus'])->name('toggle_officer_status');

Route::get('/viewOfficerAppointment', [OfficerController::class, 'viewAppointment'])->name('officer_view_appointment');




// visitor related routes
Route::get('/visitor', [VisitorController::class, 'index'])->name('visitor_index');
Route::post('/visitor', [VisitorController::class, 'store'])->name('visitor_insert');

Route::post('/editVisitor', [VisitorController::class, 'edit'])->name('update_visitor');

Route::post('/getVisitorDetailByID', [VisitorController::class, 'getDetail'])->name('visitor_detail');

Route::post('/toggleVisitorStatus', [VisitorController::class, 'toggleStatus'])->name('toggle_visitor_status');

Route::get('/viewVisitorAppointment', [VisitorController::class, 'viewAppointment'])->name('visitor_view_appointment');



// activity related routes 
Route::get('/activity', [ActivityController::class, 'index'])->name('activity_index');

Route::post('/activity', [ActivityController::class, 'store'])->name('activity_insert');

Route::post('/editActivity', [ActivityController::class, 'edit'])->name('activity_edit');

Route::get('/fetchActivity', [ActivityController::class, 'fetchActivity'])->name('activity_fetch');

Route::get('/filterBasedOnType', [ActivityController::class, 'filterBasedOnType'])->name('activity_filter_based_on_type');

Route::get('/filterBasedOnStatus', [ActivityController::class, 'filterBasedOnStatus'])->name('activity_filter_based_on_status');

Route::get('/filterBasedOnOfficer', [ActivityController::class, 'filterBasedOnOfficer'])->name('activity_filter_based_on_officer');

Route::get('/filterBasedOnVisitor', [ActivityController::class, 'filterBasedOnVisitor'])->name('activity_filter_based_on_visitor');

Route::get('/filterBasedOnDateRange', [ActivityController::class, 'filterBasedOnDateRange'])->name('activity_filter_based_on_date');

Route::get('/filterBasedOnTimeRange', [ActivityController::class, 'filterBasedOnTimeRange'])->name('activity_filter_based_on_time');

Route::post('/fetchActivityBasedOnID', [ActivityController::class, 'fetchActivityBasedOnID'])->name('activity_fetch_based_on_id');

Route::post('/cancelActivity', [ActivityController::class, 'cancelActivity'])->name('cancel_activity');


