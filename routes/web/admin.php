<?php

/*
|--------------------------------------------------------------------------
| SPA Auth Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with '/'.
| These routes use the root namespace 'App\Http\Controllers\Web'.
|
 */

use App\Base\Constants\Auth\Role;

/*
 * These routes are used for web authentication.
 *
 * Route prefix 'api/spa'.
 * Root namespace 'App\Http\Controllers\Web\Admin'.
 */

/**
 * Temporary dummy route for testing SPA.
 */


Route::middleware('guest')->namespace('Admin')->group(function () {

    // Get admin-login form
    Route::get('login', 'AdminViewController@viewLogin');

//forgot Password
    Route::get('forgot_password', 'AdminViewController@forgotPassword');
    Route::post('forgot_password', 'AdminViewController@sendLink');
    Route::get('reset-password/{token}', 'AdminViewController@showResetPasswordForm')->name('reset.password.get');
    Route::post('reset-password', 'AdminViewController@submitResetPasswordForm')->name('reset.password.post');


    Route::get('company-login', 'FleetOwnerController@viewLogin');

    Route::get('login/{provider}', 'AdminViewController@redirectToProvider');

    Route::get('login/callback/{provider}', 'AdminViewController@handleProviderCallback');
});

// landing website


Route::namespace('Admin')->group(function () {

    Route::get('/homepage' , 'WebHomeController@homepage')->name('homepage');
    Route::get('/abouts' , 'WebAboutController@about')->name('about');
    Route::get('/services' , 'WebServiceController@service')->name('service');
    Route::get('/contacts' , 'WebContactController@contact')->name('contact');
    Route::get('/privacy-policy' , 'WebPrivacyController@privacy')->name('privacy');
    Route::get('/terms' , 'WebTermController@terms')->name('terms');
    });

    // landing end

Route::middleware('auth:web')->group(function () {

    Route::namespace('Admin')->group(function () {
        Route::get('dispatcher-request','AdminViewController@dispatchRequest');
    // Owner Management (Company Management)
    Route::group(['prefix' => 'owners'], function () {
        Route::get('by_area', 'OwnerController@index')->name('ownerByArea');
        Route::get('by_area/fetch', 'OwnerController@getAllOwner');
        Route::get('/create', 'OwnerController@create');
        Route::post('store', 'OwnerController@store');
        Route::get('/{owner}', 'OwnerController@getById');
        Route::post('update/{owner}', 'OwnerController@update');
        Route::get('toggle_status/{owner}', 'OwnerController@toggleStatus');
        Route::get('toggle_approve/{owner}', 'OwnerController@toggleApprove');
        Route::get('delete/{owner}', 'OwnerController@delete');
        Route::get('get/owner', 'OwnerController@getOwnerByArea')->name('getOwnerByArea');
        Route::get('document/view/{owner}', 'OwnerDocumentController@index')->name('ownerDocumentView');
        Route::get('upload/document/{owner}/{needed_document}', 'OwnerDocumentController@documentUploadView');
        Route::post('upload/document/{owner}/{needed_document}', 'OwnerDocumentController@uploadDocument')->name('updateOwnerDocument');
        Route::post('approve/documents', 'OwnerDocumentController@approveOwnerDocument')->name('approveOwnerDocument');
        Route::get('payment-history/{owner}', 'OwnerController@OwnerPaymentHistory');
        Route::post('payment-history/{owner}', 'OwnerController@StoreOwnerPaymentHistory');
    });

    // Fleet CRUD
    Route::group(['prefix' => 'fleets'], function () {
        Route::get('/', 'FleetController@index')->name('viewFleet');
        Route::get('/fetch', 'FleetController@fetch')->name('fetchFleet');
        Route::get('/create', 'FleetController@create')->name('createFleet');
        Route::post('store', 'FleetController@store')->name('storeFleet');
        Route::get('edit/{fleet}', 'FleetController@getById')->name('editFleet');
        Route::post('update/{fleet}', 'FleetController@update')->name('updateFleet');
        Route::get('multiimg/delete/{fleetImg}', 'FleetController@multiImgDelete')->name('multiimgDelete');
        Route::get('toggle_status/{fleet}', 'FleetController@toggleStatus')->name('toggleFleetStatus');
        Route::get('toggle_approve/{fleet}', 'FleetController@toggleApprove')->name('toggleFleetApprove');
        Route::get('delete/{fleet}', 'FleetController@delete')->name('deleteFleet');
        Route::post('update/decline/reason', 'FleetController@updateFleetDeclineReason')->name('updateFleetDeclineReason');
        Route::get('assign_driver/{fleet}', 'FleetController@assignDriverView')->name('assignFleetToDriverView');
        Route::post('assign_driver/{fleet}', 'FleetController@assignDriver')->name('assignFleetToDriver');
        Route::get('document/view/{fleet}', 'FleetDocumentController@index')->name('FleetDocumentView');
        Route::get('upload/document/{fleet}/{needed_document}', 'FleetDocumentController@documentUploadView');
        Route::post('upload/document/{fleet}/{needed_document}', 'FleetDocumentController@uploadDocument')->name('updateFleetDocument');
        Route::post('approve/documents', 'FleetDocumentController@approveFleetDocument')->name('approveFleetDocument');
        Route::get('/add_photos', 'FleetController@addPhoto')->name('addPhotos');

    });
//Fleet drivers

    Route::group(['prefix' => 'fleet-drivers'], function () {
        // prefix('drivers')->group(function () {
        Route::get('/', 'FleetDriverController@index');
        Route::get('/fetch/approved', 'FleetDriverController@getApprovedFleetDrivers');

        Route::get('/waiting-for-approval', 'FleetDriverController@approvalPending');
        // Route::get('/fetch', 'DriverController@getAllDrivers');
        Route::get('/fetch/approval-pending-drivers', 'FleetDriverController@getApprovalPendingFleetDrivers');
        Route::get('/fetch/driver-ratings', 'FleetDriverController@fetchFleetDriverRatings');

        Route::get('/create', 'FleetDriverController@create');
        Route::post('store', 'FleetDriverController@store');
        Route::get('/{driver}', 'FleetDriverController@getById');
        Route::get('request-list/{driver}', 'FleetDriverController@DriverTripRequestIndex');
        Route::get('request-list/{driver}/fetch', 'FleetDriverController@FleetDriverTripRequest');
        Route::get('payment-history/{driver}', 'FleetDriverController@FleetDriverPaymentHistory');
        Route::post('payment-history/{driver}', 'FleetDriverController@StoreFleetDriverPaymentHistory');
        Route::post('update/{driver}', 'FleetDriverController@update');
        Route::get('toggle_status/{driver}', 'FleetDriverController@toggleStatus');
        Route::get('toggle_approve/{driver}/{approval_status}', 'FleetDriverController@toggleApprove');
        Route::get('toggle_available/{driver}', 'FleetDriverController@toggleAvailable');
        Route::get('delete/{driver}', 'FleetDriverController@delete');
        Route::get('document/view/{driver}', 'FleetDriverDocumentController@index');
        Route::get('upload/document/{driver}/{needed_document}', 'FleetDriverDocumentController@documentUploadView');
        Route::post('upload/document/{driver}/{needed_document}', 'FleetDriverDocumentController@uploadDocument');
        Route::post('approve/documents', 'FleetDriverDocumentController@approveFleetDriverDocument')->name('approveFleetDriverDocument');
        Route::get('get/carmodel', 'FleetDriverController@getCarModel')->name('getCarModel');
        Route::post('update/decline/reason', 'FleetDriverController@UpdateDriverDeclineReason')->name('UpdateFleetDriverDeclineReason');

        });
  // Driver Management
    Route::group(['prefix' => 'company/drivers','namespace'=>'Company'], function () {
        // prefix('drivers')->group(function () {
        Route::get('/', 'DriverController@index')->name('companyDriverView');
        Route::get('/fetch', 'DriverController@getAllDrivers');
        Route::get('/create', 'DriverController@create');
        Route::post('store', 'DriverController@store');
        Route::get('/{driver}', 'DriverController@getById');
        Route::post('update/{driver}', 'DriverController@update');
        Route::get('toggle_status/{driver}', 'DriverController@toggleStatus');
        Route::get('toggle_approve/{driver}', 'DriverController@toggleApprove');
        Route::get('toggle_available/{driver}', 'DriverController@toggleAvailable');
        Route::get('delete/{driver}', 'DriverController@delete');
        Route::get('document/view/{driver}', 'DriverDocumentController@index')->name('companyDriverDocumentView');
        Route::get('get/carmodel', 'DriverController@getCarModel')->name('getCarModel');
        Route::get('profile/{driver}', 'DriverController@profile');
        Route::get('hire/view', 'DriverController@hireDriverView')->name('hireDriverView');
        Route::post('hire', 'DriverController@hireDriver')->name('hireDriver');
        Route::get('vehicle/privileges/{driver}','DriverController@fleetPrivilegeView')->name('fleetPrivilegeView');
        Route::post('store/vehicle/privileges/{driver}','DriverController@storePrivilegedVehicle')->name('storePrivilegedVehicle');
        Route::get('unlink/fleet/{driver}/{vehicle}','DriverController@unlinkVehicle')->name('unlinkVehicle');
    });



  });
});



Route::middleware('guest')->namespace('Dispatcher')->group(function () {
    // Get admin-login form
    Route::get('dispatch-login', 'DispatcherController@loginView');
});


Route::namespace('Admin')->group(function () {
    Route::get('track/request/{request}', 'AdminViewController@trackTripDetails');
});


Route::middleware('auth:web')->group(function () {
    Route::post('logout', function () {
        auth('web')->logout();
        request()->session()->invalidate();
        return redirect('login');
    });
    // Masters Crud
    Route::middleware(role_middleware(Role::webPanelLoginRoles()))->group(function () {
        /**
         * Vehicle Types
         */
        Route::namespace('Admin')->group(function () {
            Route::get('view-services', 'AdminViewController@viewServices');
            Route::prefix('types')->group(function () {
                Route::get('/', 'VehicleTypeController@index');
                Route::get('/fetch', 'VehicleTypeController@getAllTypes');
                Route::get('by/admin', 'VehicleTypeController@byAdmin');
                Route::get('/create', 'VehicleTypeController@create');
                Route::post('/store', 'VehicleTypeController@store');
                Route::get('edit/{id}', 'VehicleTypeController@edit');
                Route::post('/update/{vehicle_type}', 'VehicleTypeController@update');
                Route::get('toggle_status/{vehicle_type}', 'VehicleTypeController@toggleStatus');
                Route::get('/delete/{vehicle_type}', 'VehicleTypeController@delete');
            });
        });
    });

    Route::namespace('Admin')->group(function () {
        // Change Locale
        Route::get('/change/lang/{lang}', 'AdminViewController@changeLocale')->name('changeLocale');

        Route::get('dashboard', 'DashboardController@dashboard');
        // Route::get('dashboard', 'AdminViewController@dashboard');
        Route::get('/admin_dashboard', 'AdminViewController@viewTestDashboard')->name('admin_dashboard');

        Route::group(['prefix' => 'company',  'middleware' => 'permission:view-companies'], function () {
            // prefix('company')->group(function () {
            Route::get('/', 'CompanyController@index');
            Route::get('/fetch', 'CompanyController@getAllCompany');
            Route::get('by/admin', 'CompanyController@byAdmin');
            Route::get('/create', 'CompanyController@create');
            Route::post('store', 'CompanyController@store');
            Route::get('edit/{company}', 'CompanyController@getById');
            Route::post('update/{company}', 'CompanyController@update');
            Route::get('toggle_status/{company}', 'CompanyController@toggleStatus');
            Route::get('delete/{company}', 'CompanyController@delete');
        });

/*Fleet Seat Layout*/


        Route::group(['prefix' => 'fleet_seat_layout',  'middleware' => 'permission:seat_layout'], function () {
            Route::get('/seat_layout', 'SeatLayoutController@seatLayout');
            Route::get('/', 'SeatLayoutController@index')->name('busSeats');
            Route::get('/fetch', 'SeatLayoutController@getAllSeatLayout');
            Route::get('/fetch/bus', 'SeatLayoutController@fetchBus')->name('getBus');

            Route::get('/create', 'SeatLayoutController@create');
            Route::post('/store', 'SeatLayoutController@store');
            Route::post('/seat/view/modal', 'SeatLayoutController@seatajax');

            Route::get('edit/{fleet}', 'SeatLayoutController@getById');
            Route::get('delete/{fleet}', 'SeatLayoutController@delete');


            Route::post('update', 'SeatLayoutController@update');
            Route::get('toggle_status/{fleet_seat_layout}', 'SeatLayoutController@toggleStatus');
            // Route::get('delete/{fleet_seat_layout}', 'SeatLayoutController@delete');

// test
            Route::get('/create1', 'SeatLayoutController@create1');



        });


        Route::group(['prefix' => 'admins',  'middleware' => 'permission:admin'], function () {
            // prefix('admins')->group(function () {
            Route::get('/', 'AdminController@index');
            Route::get('/fetch', 'AdminController@getAllAdmin');
            Route::get('/create', 'AdminController@create');
            Route::post('store', 'AdminController@store');
            Route::get('edit/{admin}', 'AdminController@getById');
            Route::post('update/{admin}', 'AdminController@update');
            Route::get('toggle_status/{user}', 'AdminController@toggleStatus');
            Route::get('delete/{user}', 'AdminController@delete');
            Route::get('profile/{user}', 'AdminController@viewProfile');
            Route::post('profile/update/{user}', 'AdminController@updateProfile');
        });

        Route::group(['prefix' => 'users',  'middleware' => 'permission:user-menu'], function () {
            // prefix('users')->group(function () {
            Route::get('/', 'UserController@index');
            Route::get('/fetch', 'UserController@getAllUser');
            Route::get('/create', 'UserController@create');
            Route::post('store', 'UserController@store');
            Route::get('edit/{user}', 'UserController@getById');
            Route::post('update/{user}', 'UserController@update');
            Route::get('toggle_status/{user}', 'UserController@toggleStatus');
            Route::get('delete/{user}', 'UserController@delete');
            Route::get('/request-list/{user}', 'UserController@UserTripRequest');
            Route::get('payment-history/{user}', 'UserController@userPaymentHistory');
            Route::post('payment-history/{user}', 'UserController@StoreUserPaymentHistory');
            // Route::get('/import-view', 'UserController@importUserView');
            Route::post('/import-user', 'UserController@importUser');
            Route::get('/download', 'UserController@downloadFile');
    });

        Route::group(['prefix' => 'sos',  'middleware' => 'permission:view-sos'], function () {
            // prefix('sos')->group(function () {
            Route::get('/', 'SosController@index');
            Route::get('/fetch', 'SosController@getAllSos');
            Route::get('/create', 'SosController@create');
            Route::post('store', 'SosController@store');
            Route::get('/{sos}', 'SosController@getById');
            Route::post('update/{sos}', 'SosController@update');
            Route::get('toggle_status/{sos}', 'SosController@toggleStatus');
            Route::get('delete/{sos}', 'SosController@delete');
    });

        Route::group(['prefix' => 'service_location',  'middleware' => 'permission:service_location'], function () {
            // prefix('service_location')->group(function () {
            Route::get('/', 'ServiceLocationController@index');
            Route::get('/fetch', 'ServiceLocationController@getAllLocation');
            Route::get('/create', 'ServiceLocationController@create');
            Route::post('store', 'ServiceLocationController@store');
            Route::get('edit/{service_location}', 'ServiceLocationController@getById');
            Route::post('update/{service_location}', 'ServiceLocationController@update');
            Route::get('toggle_status/{service_location}', 'ServiceLocationController@toggleStatus');
            Route::get('delete/{service_location}', 'ServiceLocationController@delete');
            Route::get('get/currency/', 'ServiceLocationController@getCurrencyByCountry')->name('getCurrencyByCountry');
            Route::get('/search/city', 'ServiceLocationController@getCityBySearch')->name('getCityBySearch');
            Route::get('/coords/by_keyword/{keyword}', 'ServiceLocationController@getCoordsByKeyword')->name('getCoordsByKeyword');

            Route::get('zone_cancellaion_fee/{service_location}', 'ServiceLocationController@cancellatonFeeView');
            Route::post('zone_cancellaion_fee/update/{service_location}', 'ServiceLocationController@cancellatonFeeUpdate');


    });
/*Journey*/
        Route::group(['prefix' => 'journey',  'middleware' => 'permission:view_journey'], function () {
            Route::get('/', 'JourneyController@index');
            Route::get('/completed', 'JourneyController@completedJourneys');
            Route::get('/create', 'JourneyController@create');
            Route::post('/store', 'JourneyController@store');
            Route::get('/fetch', 'JourneyController@fetch');
            Route::get('completed/fetch', 'JourneyController@completedFetch');

            Route::get('/cancelled', 'JourneyController@cancelledJourneys');
            Route::get('cancelled/fetch', 'JourneyController@cancelledFetch');
/*view Journey*/
            Route::get('view/{journey}', 'JourneyController@viewJourney');

            Route::get('single-journey/{journey}', 'JourneyController@signleJourney');

            Route::get('edit/{journey}', 'JourneyController@getById');
            Route::post('update/{journey}', 'JourneyController@update');
            Route::get('delete/{journey}', 'JourneyController@delete');
            Route::get('cancel/{journey}', 'JourneyController@cancel');
            Route::get('get/fleet', 'JourneyController@getFleet')->name('getFleet');
            Route::get('get/getPoint', 'JourneyController@getBoarding')->name('getPoint');
            Route::get('assign-driver/{journey}', 'JourneyController@assignDriverView');
            Route::post('assign-driver/update/{journey}', 'JourneyController@assignDriverupdate');
    });
 /*Ticket*/
        Route::group(['prefix' => 'tickets',  'middleware' => 'permission:view_tickets'], function () {
            Route::get('/booked_tickets', 'TicketController@ticketsBoooked');
            Route::get('/fetch', 'TicketController@fetch');
            Route::get('/cancelled_ticket/fetch', 'TicketController@cancelledTicketFetch');
            Route::get('/passengers/{journey_user}', 'TicketController@passengers');
            Route::get('/cancelled_tickets','TicketController@refundRequest');
            Route::get('/cancelled_tickets/view/{user}','TicketController@refundRequestView');
            Route::get('/refund/approve/{wallet_withdrawal_request}','TicketController@approveRefundRequest');
            Route::get('/refund/decline/{wallet_withdrawal_request}','TicketController@declineRefundRequest');
            Route::get('get/ticket', 'TicketController@getTicket')->name('getTicket');

        });

// Faq CRUD
        Route::group(['prefix' => 'faq',  'middleware' => 'permission:manage-faq'], function () {
            Route::get('/', 'FaqController@index');
            Route::get('/fetch', 'FaqController@fetch');
            Route::get('/create', 'FaqController@create');
            Route::post('store', 'FaqController@store');
            Route::get('/{faq}', 'FaqController@getById');
            Route::post('update/{faq}', 'FaqController@update');
            Route::get('toggle_status/{faq}', 'FaqController@toggleStatus');
            Route::get('delete/{faq}', 'FaqController@delete');
        });

 // Cancellation Reason CRUD
        Route::group(['prefix' => 'cancellation',  'middleware' => 'permission:cancellation-reason'], function () {
            Route::get('/', 'CancellationReasonController@index');
            Route::get('/fetch', 'CancellationReasonController@fetch');
            Route::get('/create', 'CancellationReasonController@create');
            Route::post('store', 'CancellationReasonController@store');
            Route::get('/{reason}', 'CancellationReasonController@getById');
            Route::post('update/{reason}', 'CancellationReasonController@update');
            Route::get('toggle_status/{reason}', 'CancellationReasonController@toggleStatus');
            Route::get('delete/{reason}', 'CancellationReasonController@delete');
        });



 // Promo Codes CRUD
        Route::group(['prefix' => 'promo',  'middleware' => 'permission:manage-promo'], function () {
            Route::get('/', 'PromoCodeController@index');
            Route::get('/fetch', 'PromoCodeController@fetch');
            Route::get('/create', 'PromoCodeController@create');
            Route::post('store', 'PromoCodeController@store');
            Route::get('/{promo}', 'PromoCodeController@getById');
            Route::post('update/{promo}', 'PromoCodeController@update');
            Route::get('toggle_status/{promo}', 'PromoCodeController@toggleStatus');
            Route::get('delete/{promo}', 'PromoCodeController@delete');
        });

 // Manage Notifications
        Route::group(['prefix' => 'notifications',  'middleware' => 'permission:manage-promo'], function () {
            Route::get('/push', 'NotificationController@index');
            Route::get('push/fetch', 'NotificationController@fetch');
            Route::get('push/view', 'NotificationController@pushView');
            Route::post('push/send', 'NotificationController@sendPush');
            Route::get('push/delete/{notification}', 'NotificationController@delete');
        });

 // Complaint Title CRUD
        Route::group(['prefix' => 'complaint/title',  'middleware' => 'permission:cancellation-reason'], function () {
            Route::get('/', 'ComplaintTitleController@index');
            Route::get('/fetch', 'ComplaintTitleController@fetch');
            Route::get('/create', 'ComplaintTitleController@create');
            Route::post('store', 'ComplaintTitleController@store');
            Route::get('/{title}', 'ComplaintTitleController@getById');
            Route::post('update/{title}', 'ComplaintTitleController@update');
            Route::get('toggle_status/{title}', 'ComplaintTitleController@toggleStatus');
            Route::get('delete/{title}', 'ComplaintTitleController@delete');
        });

        Route::group(['prefix' => 'complaint'], function () {
            Route::get('/users', 'ComplaintController@userComplaint');
            Route::get('/users/general', 'ComplaintController@userGeneralComplaint');
            Route::get('/users/request', 'ComplaintController@userRequestComplaint');
            Route::get('/drivers', 'ComplaintController@driverComplaint');
             Route::get('/drivers/general', 'ComplaintController@driverGeneralComplaint');
            Route::get('/drivers/request', 'ComplaintController@driverRequestComplaint');
            Route::get('/owner', 'ComplaintController@ownerComplaint');
             Route::get('/owner/general', 'ComplaintController@ownerGeneralComplaint');
            Route::get('/owner/request', 'ComplaintController@ownerRequestComplaint');
            Route::get('/taken/{complaint}', 'ComplaintController@takeComplaint');
            Route::get('/solved/{complaint}', 'ComplaintController@solveComplaint');
        });

        // Report page
        Route::group(['prefix' => 'reports',  'middleware' => 'permission:reports'], function () {
            Route::get('/user', 'ReportController@userReport')->name('userReport');
            Route::get('/owner', 'ReportController@ownerReport')->name('ownerReport');
            Route::get('/travel', 'ReportController@travelReport')->name('travelReport');
            Route::any('/download', 'ReportController@downloadReport')->name('downloadReport');
        });

        // Manage Map
        // Route::group(['prefix' => 'map',  'middleware' => 'permission:manage-map'], function () {
        //     Route::get('/view', 'MapController@mapView')->name('mapView');
        //     Route::get('/mapbox-view', 'MapController@mapViewMapbox')->name('mapViewMapbox');
        //     Route::get('/heatmap{zone_id?}', 'MapController@heatMapView')->name('heatMapView');
        //     Route::get('/get/zone', 'MapController@getZoneByServiceLocation')->name('getZoneByServiceLocation');
        // });


    //purchaseCode
        Route::group(['prefix' => 'purchasecode'], function () {
        Route::get('/', 'PurchaseCodeController@index');
        Route::post('/verification', 'PurchaseCodeController@verifyPurchasecode');

        });


         // Website-home
         Route::group(['prefix' => 'home',  'middleware' => 'permission:manage-home'], function () {
            Route::get('/', 'WebHomeController@index');
            Route::get('/fetch', 'WebHomeController@fetch');
            Route::get('/create', 'WebHomeController@create');
            Route::post('store', 'WebHomeController@store');
            Route::get('/{webhome}', 'WebHomeController@getById');
            // Route::post('/update', 'WebHomeController@update');
            Route::post('/update/{webhome}', 'WebHomeController@update');

            Route::get('toggle_status/{home}', 'WebHomeController@toggleStatus');
            Route::get('delete/{home}', 'WebHomeController@delete');
        });
// Website-about
         Route::group(['prefix' => 'about',  'middleware' => 'permission:manage-about'], function () {
            Route::get('/', 'WebAboutController@index');
            Route::get('/fetch', 'WebAboutController@fetch');
            Route::get('/create', 'WebAboutController@create');
            Route::post('store', 'WebAboutController@store');
            Route::get('/{webabout}', 'WebAboutController@getById');
            // Route::post('/update', 'WebAboutController@update');
            Route::post('/update/{webabout}', 'WebAboutController@update');

            Route::get('toggle_status/{about}', 'WebAboutController@toggleStatus');
            Route::get('delete/{about}', 'WebAboutController@delete');
        });

 // Website-service
        Route::group(['prefix' => 'service',  'middleware' => 'permission:manage-service'], function () {
            Route::get('/', 'WebServiceController@index');
            Route::get('/fetch', 'WebServiceController@fetch');
            Route::get('/create', 'WebServiceController@create');
            Route::post('store', 'WebServiceController@store');
            Route::get('/{webservice}', 'WebServiceController@getById');
            // Route::post('/update', 'WebServiceController@update');
            Route::post('/update/{webservice}', 'WebServiceController@update');

            Route::get('toggle_status/{service}', 'WebServiceController@toggleStatus');
            Route::get('delete/{service}', 'WebServiceController@delete');
        });

// Website-contact
        Route::group(['prefix' => 'contact',  'middleware' => 'permission:manage-contact'], function () {
            Route::get('/', 'WebContactController@index');
            Route::get('/fetch', 'WebContactController@fetch');
            Route::get('/create', 'WebContactController@create');
            Route::post('store', 'WebContactController@store');
            Route::get('/{webcontact}', 'WebContactController@getById');
            // Route::post('/update', 'WebContactController@update');
            Route::post('/update/{webcontact}', 'WebContactController@update');

            Route::get('toggle_status/{contact}', 'WebContactController@toggleStatus');
            Route::get('delete/{contact}', 'WebContactController@delete');
        });

// Website-terms
Route::group(['prefix' => 'term',  'middleware' => 'permission:manage-term'], function () {
    Route::get('/', 'WebTermController@index');
    Route::get('/fetch', 'WebTermController@fetch');
    Route::get('/create', 'WebTermController@create');
    Route::post('store', 'WebTermController@store');
    Route::get('/{webterm}', 'WebTermController@getById');
    // Route::post('/update', 'WebTermController@update');
    Route::post('/update/{webterm}', 'WebTermController@update');

    Route::get('toggle_status/{term}', 'WebTermController@toggleStatus');
    Route::get('delete/{term}', 'WebTermController@delete');
});

// Website-privacy
Route::group(['prefix' => 'privacy',  'middleware' => 'permission:manage-privacy'], function () {
    Route::get('/', 'WebPrivacyController@index');
    Route::get('/fetch', 'WebPrivacyController@fetch');
    Route::get('/create', 'WebPrivacyController@create');
    Route::post('store', 'WebPrivacyController@store');
    Route::get('/{webprivacy}', 'WebPrivacyController@getById');
    // Route::post('/update', 'WebPrivacyController@update');
    Route::post('/update/{webprivacy}', 'WebPrivacyController@update');

    Route::get('toggle_status/{privacy}', 'WebPrivacyController@toggleStatus');
    Route::get('delete/{privacy}', 'WebPrivacyController@delete');
});

 // Website-header-footer
        Route::group(['prefix' => 'header',  'middleware' => 'permission:manage-header'], function () {
            Route::get('/', 'WebHeaderController@index');
            Route::get('/fetch', 'WebHeaderController@fetch');
            Route::get('/create', 'WebHeaderController@create');
            Route::post('store', 'WebHeaderController@store');
            Route::get('/{webheader}', 'WebHeaderController@getById');
            Route::post('/update/{webheader}', 'WebHeaderController@update');

            Route::get('toggle_status/{header}', 'WebHeaderController@toggleStatus');
            Route::get('delete/{header}', 'WebHeaderController@delete');
        });

    });
     // Admin Group End....

    Route::namespace('Master')->group(function () {

        Route::prefix('roles')->group(function () {
            Route::get('/', 'RoleController@index');
            Route::get('create', 'RoleController@create');
            Route::post('store', 'RoleController@store');
            Route::get('edit/{id}', 'RoleController@getById');
            Route::post('update/{role}', 'RoleController@update');
            Route::get('assign/permissions/{id}', 'RoleController@assignPermissionView');
            Route::post('assign/permissions/update/{role}', 'RoleController@attachAndDetachPermissions');
        });
        Route::prefix('system/settings')->group(function () {
            Route::get('/', 'SettingController@index');
            Route::post('/', 'SettingController@store');
        });

    // Countries CRUD
            Route::group(['prefix' => 'country',  'middleware' => 'permission:manage-country'], function () {
                Route::get('/', 'CountryController@index');
                Route::get('/fetch', 'CountryController@fetch');
                Route::get('/create', 'CountryController@create');
                Route::post('store', 'CountryController@store');
                Route::get('/{country}', 'CountryController@getById');
                Route::post('update/{country}', 'CountryController@update');
                Route::get('toggle_status/{country}', 'CountryController@toggleStatus');
                Route::get('delete/{country}', 'CountryController@delete');
            });
             // Cities CRUD
             Route::group(['prefix' => 'city',  'middleware' => 'permission:manage-city'], function () {
                Route::get('/', 'CityController@index');
                Route::get('/fetch', 'CityController@fetch');
                Route::get('/create', 'CityController@create');
                Route::post('store', 'CityController@store');
                Route::get('/{city}', 'CityController@getById');
                Route::post('update/{city}', 'CityController@update');
                Route::get('toggle_status/{city}', 'CityController@toggleStatus');
                Route::get('delete/{city}', 'CityController@delete');
            });
         // Driver Needed Document CRUD
            Route::group(['prefix' => 'needed_doc',  'middleware' => 'permission:manage-driver-needed-document'], function () {
                Route::get('/', 'DriverNeededDocumentController@index');
                Route::get('/fetch', 'DriverNeededDocumentController@fetch');
                Route::get('/create', 'DriverNeededDocumentController@create');
                Route::post('store', 'DriverNeededDocumentController@store');
                Route::get('/{needed_doc}', 'DriverNeededDocumentController@getById');
                Route::post('update/{needed_doc}', 'DriverNeededDocumentController@update');
                Route::get('toggle_status/{needed_doc}', 'DriverNeededDocumentController@toggleStatus');
                Route::get('delete/{needed_doc}', 'DriverNeededDocumentController@delete');
            });
         // Owner Needed Document CRUD
                Route::group(['prefix' => 'owner_needed_doc',  'middleware' => 'permission:manage-owner-needed-document'], function () {
                    Route::get('/', 'OwnerNeededDocumentController@index');
                    Route::get('/fetch', 'OwnerNeededDocumentController@fetch');
                    Route::get('/create', 'OwnerNeededDocumentController@create');
                    Route::post('store', 'OwnerNeededDocumentController@store');
                    Route::get('/{needed_doc}', 'OwnerNeededDocumentController@getById');
                    Route::post('update/{needed_doc}', 'OwnerNeededDocumentController@update');
                    Route::get('toggle_status/{needed_doc}', 'OwnerNeededDocumentController@toggleStatus');
                    Route::get('delete/{needed_doc}', 'OwnerNeededDocumentController@delete');
                });
          // Fleet Needed Document CRUD
            Route::group(['prefix' => 'fleet_needed_doc',  'middleware' => 'permission:manage-fleet-needed-document'], function () {
                Route::get('/', 'FleetNeededDocumentController@index');
                Route::get('/fetch', 'FleetNeededDocumentController@fetch');
                Route::get('/create', 'FleetNeededDocumentController@create');
                Route::post('store', 'FleetNeededDocumentController@store');
                Route::get('/{needed_doc}', 'FleetNeededDocumentController@getById');
                Route::post('update/{needed_doc}', 'FleetNeededDocumentController@update');
                Route::get('toggle_status/{needed_doc}', 'FleetNeededDocumentController@toggleStatus');
                Route::get('delete/{needed_doc}', 'FleetNeededDocumentController@delete');
                });
             //Boarding-Point CRUD
            Route::group(['prefix' => 'boarding_point',  'middleware' => 'permission:manage-boarding-point'], function () {
                Route::get('/', 'BoardingPointController@index');
                Route::get('/fetch', 'BoardingPointController@fetch');
                Route::get('/create', 'BoardingPointController@create');
                Route::post('store', 'BoardingPointController@store');
                Route::get('/{boarding}', 'BoardingPointController@getById');
                Route::post('/update/{boarding}', 'BoardingPointController@update');
                Route::get('toggle_status/{boarding_point}', 'BoardingPointController@toggleStatus');
                Route::get('delete/{boarding_point}', 'BoardingPointController@delete');
                Route::get('get/getCity', 'BoardingPointController@getCity')->name('getCity');
                Route::get('/get/getToCity/{cityId}', 'BoardingPointController@getToCity')->name('getToCity');


                });
            //Rest-Stop CRUD
            Route::group(['prefix' => 'rest',  'middleware' => 'permission:manage-rest-stop'], function () {
                Route::get('/', 'RestStopController@index');
                Route::get('/fetch', 'RestStopController@fetch');
                Route::get('/create', 'RestStopController@create');
                Route::post('store', 'RestStopController@store');
                Route::get('/{rest}', 'RestStopController@getById');
                Route::post('/update/{rest}', 'RestStopController@update');
                Route::get('toggle_status/{rest}', 'RestStopController@toggleStatus');
                Route::get('delete/{rest}', 'RestStopController@delete');
                });
              //Amenity CRUD
            Route::group(['prefix' => 'amenity',  'middleware' => 'permission:manage-amenity'], function () {
                Route::get('/', 'AmenityController@index');
                Route::get('/fetch', 'AmenityController@fetch');
                Route::get('/create', 'AmenityController@create');
                Route::post('store', 'AmenityController@store');
                Route::get('/{amenity}', 'AmenityController@getById');
                Route::post('/update/{amenity}', 'AmenityController@update');
                Route::get('toggle_status/{amenity}', 'AmenityController@toggleStatus');
                Route::get('delete/{amenity}', 'AmenityController@delete');
                });

        // Package type CRUD
        // Route::group(['prefix' => 'package_type',  'middleware' => 'permission:package-type'], function () {
        //     Route::get('/', 'PackageTypeController@index');
        //     Route::get('/fetch', 'PackageTypeController@fetch');
        //     Route::get('/create', 'PackageTypeController@create');
        //     Route::post('store', 'PackageTypeController@store');
        //     Route::get('/{package}', 'PackageTypeController@getById');
        //     Route::post('update/{package}', 'PackageTypeController@update');
        //     Route::get('toggle_status/{package}', 'PackageTypeController@toggleStatus');
        //     Route::get('delete/{package}', 'PackageTypeController@delete');
        // });
    });
});

    Route::middleware('auth:web')->namespace('Dispatcher')->group(function () {
        Route::prefix('dispatch')->group(function () {
        Route::get('/new', 'DispatcherController@dispatchView');
        Route::get('/', 'DispatcherController@index');
        Route::post('create/request', 'DispatcherController@createRequest');
        Route::get('/request/{requestmodel}', 'DispatcherController@fetchSingleRequest');

    });
});

