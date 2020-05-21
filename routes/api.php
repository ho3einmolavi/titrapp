<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->namespace('api\v1')->group(function () {

    Route::prefix('general')->group(function () {
        Route::get('get', 'GeneralController@generals');
    });
    Route::prefix('auth')->group(function () {
        Route::post('login', 'AuthController@login');
        Route::post('verify', 'AuthController@verify');
    });


    Route::prefix('slider')->group(function () {
        Route::middleware('auth:api')->group(function () {
            Route::get('get', 'SliderController@get');
        });
    });
    Route::middleware('auth:api')->group(function () {

        Route::prefix('ticket')->group(function () {
            Route::post('addTicket', 'TicketController@addTicket');
            Route::post('addReply', 'TicketController@addReply');
            Route::delete('deleteTicket', 'TicketController@deleteTicket');
            Route::get('ticketByUser', 'TicketController@ticketByUser');
            Route::get('replyByTicket', 'TicketController@replyByTicket');
            Route::get('categories', 'TicketController@categories');
        });
        Route::prefix('message')->group(function () {
            Route::post('send', 'MessageController@send');
            Route::delete('deleteContact', 'MessageController@deleteContact');
            Route::delete('deleteMessage', 'MessageController@deleteMessage');
            Route::get('get', 'MessageController@get');
            Route::get('unread', 'MessageController@unread');
            Route::get('contact', 'MessageController@contact');
        });


    });

    Route::middleware('auth:api')->prefix('user')->group(function () {
        Route::post('/update/profile' , 'ProfileController@update');
        Route::post('/update/skill' , 'ProfileController@updateSkil');
        Route::get('/information' , 'ProfileController@index');
    });

    Route::post('/members/search' , 'MemberController@search');
    Route::post('/members/skills' , 'MemberController@skills');

});
