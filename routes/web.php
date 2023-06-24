<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//Route::get('/', function () {
//    return redirect('patients');
//});
//Route::resource('/patients', Patients::class);


//Route::get('/patients', function () {
//    return view('all-patients');
//});
//Route::get('/patients/create', function () {
//    return view('add-patients');
//})->name('patients.create');
//
//Route::get('/patients/{patientID}', function () {
//    return view('show-patients');
//})->name('patients.show');

