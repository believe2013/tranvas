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



Route::get('/', 'HomeController@home')->name('welcome');

Route::group(['middleware' => 'auth'], function () {
    /**
     * Event related routes
     */
    $eventController = '\App\Modules\Event\Http\Controllers\EventController';
    Route::get('events', "{$eventController}@index")->name('events');
    Route::get('events/add', "{$eventController}@add")->name('event-add');
    Route::post('events/save', "{$eventController}@store")->name('event-save');
    Route::get('events/view/{event}', "{$eventController}@view")->name('event-view');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
