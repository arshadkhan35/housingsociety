<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@homeData');

Route::auth();

//Route::get('/home', 'HomeController@index');
Route::get('/contct-us', 'HomeController@contactUs');
Route::get('/userlisting', 'UserDetails@listUser')->middleware('AdminRole');
Route::get('/approve-user', 'UserDetails@approveUser');
Route::get('/edit-profile', 'Profile@editProfile')->middleware('auth');
Route::get('/save-userDetails', 'Profile@saveUserData')->middleware('auth');
Route::get('/notice-board/{id}', 'NoticeBoard@showNotices')->middleware('auth');
Route::get('/add-notice', 'NoticeBoard@addNotices')->middleware('AdminRole');
Route::get('/save-notice', 'NoticeBoard@saveNotices')->middleware('auth');
Route::get('/add-comment', 'NoticeBoard@addComment')->middleware('auth');
Route::post('add-profilePic','ProfilePicUpload@upload');
Route::get('/add-complain', 'Complain@addComplain')->middleware('auth');
Route::get('/save-complain', 'Complain@saveComplain')->middleware('auth');
Route::get('/users-complains', 'Complain@usersComplain')->middleware('AdminRole');
Route::get('/complain/{cid}', 'Complain@showComplain')->middleware('auth');
Route::get('/add-complain-comment', 'Complain@complainComment')->middleware('auth');
Route::get('/mycomplains', 'Complain@mycomplains')->middleware('auth');
Route::get('/book-hall', 'HallBooking@bookHall')->middleware('auth');
Route::get('/booking-hall', 'HallBooking@bookingHall')->middleware('auth');
Route::get('/my-booking', 'HallBooking@myBooking')->middleware('auth');
Route::get('/hall-requests', 'HallBooking@hallRequests')->middleware('auth');
Route::get('/hall-requests-approve', 'HallBooking@hallRequestsApprove')->middleware('auth');
Route::get('/generate-bill', 'MaintainanceBill@generateBill')->middleware('auth');
Route::get('/get-useData', 'MaintainanceBill@getUserData')->middleware('auth');
Route::get('/saveGenerateBill', 'MaintainanceBill@saveGenerateBill')->middleware('auth');
Route::get('/mybill', 'MaintainanceBill@myBill')->middleware('auth');
Route::get('/my-bill-data', 'MaintainanceBill@myBillData')->middleware('auth');
Route::get('/enquiry-list', 'HomeController@enquiryList')->middleware('auth');
//static pages
Route::get('/club-house', function (){
	return view('pages.clubHouse');
});
Route::get('/society-gym', function (){
	return view('pages.gym');
});
Route::get('/about-us', function (){
	return view('pages.aboutUs');
});