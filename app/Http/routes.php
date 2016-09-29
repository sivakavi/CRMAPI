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

$db_host = env('DB_HOST');

if($db_host != '127.0.0.1' && $db_host != 'localhost'){
	if (isset($_SERVER['HTTP_ORIGIN'])) {
	    //header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	    header("Access-Control-Allow-Origin: *");
	    header('Access-Control-Allow-Credentials: true');    
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
	}   
	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
	        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
	    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
	        header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

	    exit(0);
	} 
}

	Route::get('/', function () {
	    return view('welcome');
	});

/* User Controller*/

	Route::get('user', 'UserController@index');

	Route::get('user/{id}', 'UserController@show');

	Route::post('user', 'UserController@store');

	Route::post('user/edit/{id}', 'UserController@update');

	Route::post('login','UserController@login');

	Route::post('checkUserName', 'UserController@checkUserName');


/* Membership Controller*/

	Route::get('membership', 'MembershipController@index');

	Route::get('membership/{id}', 'MembershipController@show');

	Route::post('membership', 'MembershipController@store');

	Route::post('membership/edit/{id}', 'MembershipController@update');



/* Customer Controller*/

	Route::get('customer', 'CustomerController@index');

	Route::get('customer/{id}', 'CustomerController@show');

	Route::get('hotcustomer', 'CustomerController@getHotCustomer');

	Route::post('hotcustomer/{id}', 'CustomerController@updateHotCustomer');
	
	Route::post('customer', 'CustomerController@store');

	Route::post('customer/edit/{id}', 'CustomerController@update');

	Route::post('updatemembership/{id}', 'CustomerController@updateMembership');


/* Category Controller*/

	Route::get('category', 'CategoryController@index');

	Route::get('category/{id}', 'CategoryController@show');

	Route::post('category', 'CategoryController@store');

	Route::post('category/edit/{id}', 'CategoryController@update');




/* Product Controller*/

	Route::get('product', 'ProductController@index');

	Route::get('product/{id}', 'ProductController@show');

	Route::post('product', 'ProductController@store');

	Route::post('product/edit/{id}', 'ProductController@update');

	Route::get('lessQty/{qty}', 'ProductController@lessQty');

/* Case Controller*/

	Route::get('case', 'CasedController@index');

	Route::get('case/{id}', 'CasedController@show');

	Route::post('case', 'CasedController@store');

	Route::post('case/edit/{id}', 'CasedController@update');

	Route::get('getOpenCase', 'CasedController@getOpenCase');

	Route::get('getCloseCase', 'CasedController@getCloseCase');

	Route::get('getOpenCaseUser/{id}', 'CasedController@getOpenCaseUser');

	Route::get('getCloseCaseUser/{id}', 'CasedController@getCloseCaseUser');

	Route::get('getCaseYear/{year}', 'CasedController@getCaseYear');

	Route::get('getCaseYearMonth/{year}/{month}', 'CasedController@getCaseYearMonth');

	Route::get('getCaseUser/{user}', 'CasedController@getCaseUser');

	Route::get('getCaseUserYear/{user}/{year}', 'CasedController@getCaseUserYear');

	Route::get('getCaseUserYearMonth/{user}/{year}/{month}', 'CasedController@getCaseUserYearMonth');


/* Ticket Controller*/

	Route::get('ticket', 'TicketController@index');

	Route::get('ticket/{id}', 'TicketController@show');

	Route::post('ticket', 'TicketController@store');

	Route::post('ticket/edit/{id}', 'TicketController@update');

	Route::get('getOpenTicket', 'TicketController@getOpenTicket');

	Route::get('getCloseTicket', 'TicketController@getCloseTicket');

	Route::get('getOpenTicketUser/{id}', 'TicketController@getOpenTicketUser');

	Route::get('getCloseTicketUser/{id}', 'TicketController@getCloseTicketUser');

	Route::get('getTicketUser/{user}', 'TicketController@getTicketUser');

	Route::get('getTicketUserYear/{user}/{year}', 'TicketController@getTicketUserYear');

	Route::get('getTicketUserYearMonth/{user}/{year}/{month}', 'TicketController@getTicketUserYearMonth');

	Route::get('getTicketYear/{year}', 'TicketController@getTicketYear');

	Route::get('getTicketYearMonth/{year}/{month}', 'TicketController@getTicketYearMonth');

/* Appoinment Controller*/

	Route::get('appoinment', 'AppoinmentController@index');

	Route::get('appoinment/{id}', 'AppoinmentController@show');

	Route::post('appoinment', 'AppoinmentController@store');

	Route::post('appoinment/edit/{id}', 'AppoinmentController@update');

    Route::get('getAppoinmentUser/{id}', 'AppoinmentController@getAppoinmentUser');

    Route::get('getAppoinmentUserOpen/{id}', 'AppoinmentController@getAppoinmentUserOpen');

    Route::get('getAppoinmentUserClose/{id}', 'AppoinmentController@getAppoinmentUserClose');

    Route::get('getAppoinmentUserUpcoming/{id}', 'AppoinmentController@getAppoinmentUserUpcoming');

    Route::get('getAppoinmentYear/{year}', 'AppoinmentController@getAppoinmentYear');

    Route::get('getAppoinmentYearMonth/{year}/{month}', 'AppoinmentController@getAppoinmentYearMonth');

    Route::get('getAppoinmentUserYear/{user}/{year}', 'AppoinmentController@getAppoinmentUserYear');

    Route::get('getAppoinmentUserYearMonth/{user}/{year}/{month}', 'AppoinmentController@getAppoinmentUserYearMonth');




/* Todo Controller*/

	Route::get('todo', 'TodoController@index');

	Route::get('todo/{id}', 'TodoController@show');

	Route::post('todo', 'TodoController@store');

	Route::post('todo/edit/{id}', 'TodoController@update');

	Route::get('getUserTodo/{id}', 'TodoController@getUserTodo');


/* Notification Controller*/

	Route::get('notification/{id}', 'NotificationController@show');

/* Image Controller*/

	Route::post('uploadphoto', 'ImageController@imageupload');


/* Report Controller */
	
	Route::get('report', 'ReportController@index');

	Route::get('getReportYear/{year}', 'ReportController@getYear');

	Route::get('getReportYearMonth/{year}/{month}', 'ReportController@getYearMonth');

	Route::get('getReportProduct/{product}', 'ReportController@getProduct');

	Route::get('getReportProductYear/{product}/{year}', 'ReportController@getProductYear');

	Route::get('getReportProductYearMonth/{product}/{year}/{month}', 'ReportController@getProductYearMonth');

	Route::get('getReportUser/{user}', 'ReportController@getUser');

	Route::get('getReportUserYear/{user}/{year}', 'ReportController@getUserYear');

	Route::get('getReportUserYearMonth/{user}/{year}/{month}', 'ReportController@getUserYearMonth');
