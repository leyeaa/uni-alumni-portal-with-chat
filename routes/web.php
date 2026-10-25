<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ServiceController;

use App\Livewire\AlumniDashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [GeneralController::class, 'index'])->name('home');

Route::get('/about-us', [GeneralController::class, 'about'])
    ->name('about');

Route::get('/contact-us', [GeneralController::class, 'contactUs']);

Route::get('/registration', [AlumniController::class, 'registration'])
    ->name('signup');

Route::post('/register', [AlumniController::class, 'register']);

Route::post('/alumni/authenticate', [AlumniController::class, 'authenticate']);

Route::get('/donate', [GeneralController::class, 'donation'])
    ->name('donation');

Route::post('/donationInformation', [GeneralController::class, 'donorVerification'])
    ->name('donationData');

Route::post('/donation/paystack', [GeneralController::class, 'donationPaystack'])
    ->name('donation.paystack');

Route::get('/donation/callback', [GeneralController::class, 'donationCallback'])
    ->name('donation.callback');

Route::get('/alumniExecutive', [GeneralController::class, 'executive'])
    ->name('executive');

Route::post('/feedback', [GeneralController::class, 'sendFeedback']);

Route::get('/event/{id}', [GeneralController::class, 'eventRead'])
    ->name('event.read');

/*
|--------------------------------------------------------------------------
| PUBLIC NEWS & EVENTS
|--------------------------------------------------------------------------
*/

Route::get('/news', [GeneralController::class, 'news'])
    ->name('news.index');

Route::get('/news/{slug}', [GeneralController::class, 'newsRead'])
    ->name('news.read');

Route::get('/events', [GeneralController::class, 'events'])
    ->name('events.index');

Route::get('/events/{id}', [GeneralController::class, 'eventRead'])
    ->name('events.read');

// PUBLIC NEWS PAGE
Route::get('/news', [GeneralController::class, 'newsIndex'])->name('news.index');

// PUBLIC EVENTS PAGE
Route::get('/events', [GeneralController::class, 'eventsIndex'])->name('events.index');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFILE & DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/directory', [AlumniController::class, 'alumniDirectory'])
        ->name('directory');

    Route::get('/editProfile', [AlumniController::class, 'profile'])
        ->name('profile');

    Route::patch('/profile/{id}', [AlumniController::class, 'updateProfile']);

    Route::get('/changePassword', [AlumniController::class, 'changePassword'])
        ->name('changePassword');

    Route::put('/updatePassword/{id}', [AlumniController::class, 'updatePassword']);

    Route::get('/alumniDetails/{id}', [AlumniController::class, 'alumniDetails'])
        ->name('alumniDetails');

    Route::get('/alumniDashboard', AlumniDashboard::class)
        ->name('alumniDashboard');

    Route::post('/logout', [AlumniController::class, 'logout']);

    /*
    |--------------------------------------------------------------------------
    | MESSAGES
    |--------------------------------------------------------------------------
    */

    Route::post('/sendMessage/{id}', [AlumniController::class, 'sendMessage'])
        ->name('sendMessage');

    Route::get('/chat/{id}', [AlumniController::class, 'alumniMessage'])
        ->name('chat');

    /*
    |--------------------------------------------------------------------------
    | SERVICE REQUESTS
    |--------------------------------------------------------------------------
    */

    Route::get('/services/newRequest', [ServiceController::class, 'services'])
        ->name('services');

    Route::post('/services/processRequest', [ServiceController::class, 'processServiceRequest'])
        ->name('processRequest');

    Route::get('/services/requestHistory', [ServiceController::class, 'requestsHistory'])
        ->name('requestHistory');

    Route::get('/services/{id}/edit', [ServiceController::class, 'editServiceRequest'])
        ->name('editRequest');

    Route::put('/services/{id}', [ServiceController::class, 'updateServiceRequest'])
        ->name('updateRequest');

    Route::get('/services/makePayment/{id}', [ServiceController::class, 'servicePayment'])
        ->name('servicePayment');

    /*
    |--------------------------------------------------------------------------
    | DUES
    |--------------------------------------------------------------------------
    */

    Route::get('/dues/newDueRequest', [ServiceController::class, 'dues'])
        ->name('dues');

    Route::post('/dues/processDueRequest', [ServiceController::class, 'processDueRequest'])
        ->name('processDueRequest');

    Route::get('/dues/DuerequestHistory', [ServiceController::class, 'DuerequestsHistory'])
        ->name('DuerequestHistory');

    Route::get('/dues/{id}/edit', [ServiceController::class, 'editDueRequest'])
        ->name('editDueRequest');

    Route::put('/dues/{id}', [ServiceController::class, 'updateDueRequest'])
        ->name('updateDueRequest');

    Route::get('/dues/makeDuePayment/{id}', [ServiceController::class, 'duePayment'])
        ->name('duePayment');

    /*
    |--------------------------------------------------------------------------
    | ALUMNI REGISTRATION REQUESTS
    |--------------------------------------------------------------------------
    */

    Route::get('/alumnireg/newAlumniregRequest', [ServiceController::class, 'alumnireg'])
        ->name('alumnireg');

    Route::post('/alumnireg/processAlumniregRequest', [ServiceController::class, 'processAlumniregRequest'])
        ->name('processAlumniregRequest');

    Route::get('/alumnireg/AlumniregrequestsHistory', [ServiceController::class, 'AlumniregrequestsHistory'])
        ->name('AlumniregrequestsHistory');

    Route::get('/alumnireg/{id}/edit', [ServiceController::class, 'editAlumniregRequest'])
        ->name('editAlumniregRequest');

    Route::put('/alumnireg/{id}', [ServiceController::class, 'updateAlumniregRequest'])
        ->name('updateAlumniregRequest');

    Route::get('/alumnireg/makeAlumniregPayment/{id}', [ServiceController::class, 'alumniregPayment'])
        ->name('alumniregPayment');

    /*
    |--------------------------------------------------------------------------
    | PAYSTACK PAYMENTS
    |--------------------------------------------------------------------------
    */

    Route::post('/alumniDuesPaystack', [ServiceController::class, 'alumniDuesPaystack'])
        ->name('alumniDuesPaystack');

    Route::get('/payment/duepaymentCallback', [ServiceController::class, 'duepaymentCallback'])
        ->name('duepaymentCallback');

    Route::post('/alumniRegPaystack', [ServiceController::class, 'alumniRegPaystack'])
        ->name('alumniRegPaystack');

    Route::get('/payment/alumniregpaymentCallback', [ServiceController::class, 'alumniregpaymentCallback'])
        ->name('alumniregpaymentCallback');

    Route::post('/alumniServicePaystack', [ServiceController::class, 'alumniServicePaystack'])
        ->name('alumniServicePaystack');

    Route::get('/payment/servicepaymentCallback', [ServiceController::class, 'servicepaymentCallback'])
        ->name('servicepaymentCallback');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {

    /*
    |--------------------------------------------------------------------------
    | NEWS MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::get('/news', [AdminController::class, 'news'])
        ->name('admin.news');

    Route::get('/news/create', [AdminController::class, 'createNews'])
        ->name('admin.createNews');

    Route::post('/news/store', [AdminController::class, 'storeNews'])
        ->name('admin.storeNews');

    Route::get('/news/edit/{id}', [AdminController::class, 'editNews'])
        ->name('admin.editNews');

    Route::put('/news/update/{id}', [AdminController::class, 'updateNews'])
        ->name('admin.updateNews');

    Route::delete('/news/delete/{id}', [AdminController::class, 'deleteNews'])
        ->name('admin.deleteNews');

    /*
    |--------------------------------------------------------------------------
    | EVENTS MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::get('/events', [AdminController::class, 'events'])
        ->name('admin.events');

    Route::get('/events/create', [AdminController::class, 'createEvent'])
        ->name('admin.createEvent');

    Route::post('/events/store', [AdminController::class, 'storeEvent'])
        ->name('admin.storeEvent');

    Route::get('/events/edit/{id}', [AdminController::class, 'editEvent'])
        ->name('admin.editEvent');

    Route::put('/events/update/{id}', [AdminController::class, 'updateEvent'])
        ->name('admin.updateEvent');

    Route::delete('/events/delete/{id}', [AdminController::class, 'deleteEvent'])
        ->name('admin.deleteEvent');

    /*
    |--------------------------------------------------------------------------
    | REQUEST MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::get('/service-requests', [AdminController::class, 'serviceRequests'])
        ->name('admin.serviceRequests');
        Route::get('/service-requests-ug', [AdminController::class, 'serviceRequestsug'])
        ->name('admin.serviceRequestsug');
    Route::get('/service-requests-pg', [AdminController::class, 'serviceRequestspg'])
        ->name('admin.serviceRequestspg');

    Route::post('/update-service-status/{id}', [AdminController::class, 'updateServiceStatus'])
        ->name('admin.updateServiceStatus');

    Route::get('/due-requests', [AdminController::class, 'dueRequests'])
        ->name('admin.dueRequests');

    Route::get('/alumnireg-requests', [AdminController::class, 'alumniregRequests'])
        ->name('admin.alumniregRequests');

    Route::get('/donation-history', [AdminController::class, 'donationHistory'])
        ->name('admin.donationHistory');

    /*
    |--------------------------------------------------------------------------
    | EXPORTS
    |--------------------------------------------------------------------------
    */

    Route::get('/service-requests/export/csv', [AdminController::class, 'exportServiceRequestsCsv'])
        ->name('admin.exportServiceRequestsCsv');

    Route::get('/due-requests/export/csv', [AdminController::class, 'exportDueRequestsCsv'])
        ->name('admin.exportDueRequestsCsv');

    Route::get('/alumnireg-requests/export/csv', [AdminController::class, 'exportAlumniregRequestsCsv'])
        ->name('admin.exportAlumniregRequestsCsv');

    Route::get('/donation-history/export/csv', [AdminController::class, 'exportDonationHistoryCsv'])
        ->name('admin.exportDonationHistoryCsv');
});

/*
|--------------------------------------------------------------------------
| FALLBACK ROUTE
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return view('webpages.index');
});


   Route::get('/request-application-info', [GeneralController::class, 'request_application_info'])
        ->name('request_application_info');
