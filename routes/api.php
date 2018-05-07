<?php

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Festival;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Login to be authenticated
Route::post('login', 'Auth\LoginController@login')->middleware('cors');

// Logout fro your session 
Route::post('logout', 'Auth\LoginController@logout')->middleware('cors');

// Register to get Token in order to make calls to our API
Route::post('register', 'Auth\RegisterController@register')->middleware('cors');

// Tickets API endpoints
Route::group(['middleware' => 'auth:api'], function () {
    // List Tickets
    Route::get('tickets', 'TicketsController@getAll')->middleware('cors');
    // Count Tickets
    Route::get('tickets/count', 'TicketsController@count')->middleware('cors');
    // Show Single Ticket Concert
    Route::get('ticket/{ticket}/concert', 'TicketsController@getConcert')->middleware('cors');

    // Show Single Ticket
    Route::get('ticket/{ticket}', 'TicketsController@getOneById')->middleware('cors');

    // Show Single Ticket
    Route::get('ticket/check/{barcode}', 'TicketsController@checkBarcode')->middleware('cors');

    // Create new Ticket
    Route::post('ticket', 'TicketsController@create')->middleware('cors');
    // Update Ticket
    Route::put('ticket', 'TicketsController@create')->middleware('cors');
    // Delete Ticket
    Route::delete('ticket/{ticket}', 'TicketsController@delete')->middleware('cors');

     // List Festivals
    Route::get('festivals', 'FestivalsController@getAll')->middleware('cors');
    // Count Tickets
    Route::get('festivals/count', 'FestivalsController@count')->middleware('cors');
    // Show Single Ticket
    Route::get('festival/{festival}', 'FestivalsController@getOneById')->middleware('cors');
    // Create new Ticket
    Route::post('festival', 'FestivalsController@create')->middleware('cors');
    // Update Ticket
    Route::put('festival', 'FestivalsController@create')->middleware('cors');
    // Delete Ticket
    Route::delete('festival/{festival}', 'FestivalsController@delete')->middleware('cors');

     // List Concerts
    Route::get('concerts', 'ConcertsController@getAll')->middleware('cors');
    // Count Concerts
    Route::get('concerts/count', 'ConcertsController@count')->middleware('cors');
    // Show Single Concert Tickets count getOneByDate
    Route::get('concert/{concert}/tickets/count', 'ConcertsController@countTickets')->middleware('cors');
    

    // Show Single Concert byDate
    Route::get('concert/today/{date}', 'ConcertsController@getOneByDate')->middleware('cors');

    // Show Single Concert Festival
    Route::get('concert/{concert}/festival', 'ConcertsController@getFestival')->middleware('cors');

    // Show Single Concert
    Route::get('concert/{concert}', 'ConcertsController@getOneById')->middleware('cors');
    // Create new Concert
    Route::post('concert', 'ConcertsController@create')->middleware('cors');
    // Update Concert
    Route::put('concert', 'ConcertsController@create')->middleware('cors');
    // Delete Concert
    Route::delete('concert/{concert}', 'ConcertsController@delete')->middleware('cors');
});




