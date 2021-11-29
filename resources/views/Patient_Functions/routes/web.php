<?php

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

Auth::routes();

Route::group(['middleware'=>['web','auth']], function(){
    Route::get('/', function () {
        if(Auth::user()->user_role=="patient"){
            
            return view('PatientHome.view');
        }
        if(Auth::user()->user_role=="doctor"){
            return view('CustomerHome.view');
        }
        if(Auth::user()->user_role=="admin"){
            $users['users'] = \App\users::all();
            return view('admin_landing_page',$users);
        }
       } );

     Route::get('/', function () {
        if(Auth::user()->user_role=="patient"){
            
            return view('PatientHome.view');
        }
        if(Auth::user()->user_role=="doctor"){
            return view('CustomerHome.view');
        }
        if(Auth::user()->user_role=="admin"){
            $users['users'] = \App\users::all();
            return view('admin_landing_page',$users);
        }
       } );

});


Route::resource('users','UserController');

Route::get('users.create','UserController@index');
Route::get('users.edit','ManageUserController@edit');

Route::get('AboutUs.view','AboutUsController@index');

Route::get('OurStory.view','OurStoryController@index');

Route::get('Appointment.create','AppointmentController@index');
Route::get('MakeAppointment.create','MakeAppointmentController@index');
//Route::get('ManageFeeds.manageFeeds','ManageNewsFeedsController@destroy');
Route::post('Appointment.create','AppointmentController@store')->name('appointments.store');


Route::get('ManageAppointment.manageAppointment','AppointmentApproverController@index');
Route::post('ManageAppointment.manageAppointment','AppointmentApproverController@store')->name('decision.store');

Route::get('Bills.view','BillsController@index');
Route::post('Bills.view','BillsController@store')->name('add_bill');

Route::post('ManageUser.manageUser','ManageUserController@edit');
Route::post('ManageUser.manageUser','ManageUserController@destroy');

Route::post('users.create','UserController@store')->name('users.store');

Route::get('/usersLogin.view','usersLoginController@index');
Route::get('/users.create','AddUserController@index');
Route::post('/users.create','UserController@store')->name('add_user');

Route::get('OurServices.view','OurServicesController@index');
//Route::get('/users.create','AddUserController@index');
Route::post('/CustomerHome.view','NewsLetterController@store')->name('newsletter');

Route::get('ManageUser.manageUser','ManageUserController@index');
Route::post('ManageUser.manageUser','ManageUserController@store')->name('manageUser.store');

Route::get('Enquiries.view','EnquiriesController@index');
Route::get('OurServices.view','OurServicesController@index');
Route::get('CompanyServices.view','CompanyServicesController@index');
Route::get('Services.view','ServicesController@index');
Route::post('Services.view','ServicesController@store')->name('services.store');

Route::get('RequestService.view','RequestsController@index');
Route::post('RequestService.view','RequestsController@store')->name('request_service');

Route::get('ViewRequests.view','ViewRequestsController@index');
Route::post('ViewRequests.view','ViewRequestsController@store')->name('request_approval');

Route::get('DeleteProjects.view','DeleteProjectsController@index');
Route::post('DeleteProjects.view','DeleteProjectsController@store')->name('delete_project');

Route::get('ContactUs.view','ContactUsController@index');
Route::post('ContactUs.view','ContactUsController@store')->name('contact_us');


Route::get('google', function () {
    return view('/home');
});
    
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/forgot_password', 'ForgotPassword@forgot');
Route::post('/forgot_password', 'ForgotPassword@password');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
