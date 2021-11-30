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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/officeAssistant', function () {
    return view('/officeAssistant.dashboard');
});
Route::get('/doctor', function () {
    return view('doctor');
})->name('doctor');

Route::get('/addPrescription', function () {
    return view('addPrescription');
})->name('addPrescription');

Route::get('/PatientList', function () {
    return view('PatientList');
})->name('PatientList');

Route::get('/PatientRecord', function () {
    return view('PatientRecord');
})->name('PatientRecord');

