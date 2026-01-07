<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ServiceController;
use App\Livewire\AlumniDashboard;
use App\Models\AlumniProfile;
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
//Home Page
Route::get('/', [GeneralController::class, 'index'])->name('home');
//About us page
Route::get('/about-us', [GeneralController::class, 'about'])->name('about');
//Contact Us Page
Route::get('/contact-us', [GeneralController::class, 'contactUs']);
//Alumni Registration Form
Route::get('/registration', [AlumniController::class, 'registration'])->name('signup');
//Registration Form Submission
Route::post('/register', [AlumniController::class, 'register']);
//Alumni Login
Route::post('/alumni/authenticate', [AlumniController::class, 'authenticate']);
//Alumni Members Directory
Route::get('/directory',[AlumniController::class, 'alumniDirectory'])->name('directory')->middleware('auth');

//View individual profile for update
Route::get('/editProfile', [AlumniController::class, 'profile'])->name('profile')->middleware('auth');

//edit Password Page
Route::get('/changePassword', [AlumniController::class, 'changePassword'])->name('changePassword')->middleware('auth');

//Members Details
Route::get('/alumniDetails/{id}', [AlumniController::class, 'alumniDetails'])->name('alumniDetails')->middleware('auth');

Route::get('/alumniDashboard/', AlumniDashboard::class)->name('alumniDashboard')->middleware('auth');

//Update Password
Route::put('/updatePassword/{id}', [AlumniController::class, 'updatePassword'])->middleware('auth');

//Update Profile
Route::patch('/profile/{id}', [AlumniController::class, 'updateProfile'])->middleware('auth');

Route::post('/logout', [AlumniController::class, 'logout'])->middleware('auth')->middleware('auth');

//Request Item
Route::get('/services/newRequest', [ServiceController::class, 'services'])->name('services')->middleware('auth');
//Process Request
Route::post('/services/processRequest', [ServiceController::class, 'processServiceRequest'])->name('processRequest')->middleware('auth');

//Request History
Route::get('/services/requestHistory', [ServiceController::class, 'requestsHistory'])->name('requestHistory')->middleware('auth');

//update Request
Route::put('/services/{id}', [ServiceController::class, 'updateServiceRequest'])->name('updateRequest')->middleware('auth');

//edit Request
Route::get('/services/{id}/edit', [ServiceController::class, 'editServiceRequest'])->name('editRequest')->middleware('auth');

//Make Payment
Route::get('/services/makePayment/{id}',[ServiceController::class, 'servicePayment'])->name('servicePayment')->middleware('auth');

//Send Message
Route::post('/sendMessage/{id}', [AlumniController::class,'sendMessage'])->name('sendMessage')->middleware('auth');

Route::get('/alumniDetails/{id}#reviews',[AlumniController::class,'alumniMessage'])->name('chat')->middleware('auth');

//send feedback via email
Route::post('/feedback', [GeneralController::class, 'sendFeedback']);

//FUF donation
Route::get('/donate', [GeneralController::class, 'donation'])->name('donation');

//Alumni Executive
Route::get('/alumniExecutive', [GeneralController::class, 'executive'])->name('executive');

Route::post('/donationInformation', [GeneralController::class, 'donorVerification'])->name('donationData');

Route::fallback(function(){
    return view('webpages.index');
});

