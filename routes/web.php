<?php

use Illuminate\Http\Request;
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
    return view('contact');
});

Auth::routes();

Route::get('/contact', [App\Http\Controllers\Contact_US_Form_Controller::class, 'CreateForm']);

Auth::routes();

Route::post('/contact', [App\Http\Controllers\Contact_US_Form_Controller::class, 'ContactUsForm'])->name('contact.store');

Auth::routes();