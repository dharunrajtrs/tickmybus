<?php

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with 'api/v1'.
| These routes use the root namespace 'App\Http\Controllers\Api\V1'.
|
 */
use App\Base\Constants\Auth\Role;

/**
 * These routes are prefixed with 'api/v1'.
 * These routes use the root namespace 'App\Http\Controllers\Api\V1\Driver'.
 * These routes use the middleware group 'auth'.
 */


Route::prefix('driver')->namespace('Driver')->middleware('auth')->group(function () {
    Route::middleware(role_middleware([Role::DRIVER,Role::OWNER]))->group(function () {

        /*assigned journey*/
        Route::get('journey/list', 'DriverController@assignedJourney');

        Route::get('today-journey', 'DriverController@todayJourney');

        /*completed journey*/
        Route::get('completed-journey/list', 'DriverController@completedJourney');

        /*Passenger List*/
        Route::get('journey/passenger-list', 'DriverController@passengersList');        
        
        /*Passenger List*/
        Route::post('journey/passenger-boarding-status', 'DriverController@passengersBoardingStatus');        

        /* driver Start Journey */
        Route::get('journey/start', 'DriverController@journeyStart');
       
        /* driver End Journey */
        Route::get('journey/end', 'DriverController@journeyEnd');


        // get DriverDocument
        Route::get('documents/needed', 'DriverDocumentController@index');
        // Upload Driver document
        Route::post('upload/documents', 'DriverDocumentController@uploadDocuments');
        // List All Uploaded Documents
        // Route::get('uploaded/documents', 'DriverDocumentController@listUploadedDocuments');
        // Online-offline
        Route::post('online-offline', 'OnlineOfflineController@toggle');

    });
});
