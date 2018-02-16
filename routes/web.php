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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::name('guest.')->group(function() {
    Route::get('/', 'GuestController@index')->name('index');
    Route::get('cooks', 'GuestController@cooks')->name('cooks');
});

Route::middleware(['auth'])->namespace('User')->prefix('user')->name('user.')->group(function() {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('account', 'DashboardController@account')->name('account');
    Route::patch('account', 'DashboardController@updateAccount')->name('account.update');
    Route::post('request_cook', 'CookingRequestController@create')->name('cooking_request.create');
});

Route::middleware(['auth', 'role:user'])->namespace('User')->prefix('user')->name('user.')->group(function() {
    Route::get('/', 'DashboardController@index')->name('index');
});

Route::middleware(['auth', 'role:cook'])->namespace('Cook')->prefix('cook')->name('cook.')->group(function() {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::post('/cooking_request/{cookingRequest}/approve', 'DashboardController@approveCookingRequest')
        ->name('cooking_request.approve');
    Route::delete('/cooking_request/{cookingRequest}/delete', 'DashboardController@deleteCookingRequest')
        ->name('cooking_request.delete');
    Route::post('/cooking_request/{cookingRequest}/unapprove', 'DashboardController@unapproveCookingRequest')
        ->name('cooking_request.unapprove');
    Route::post(
        '/cooking_request/{cookingRequest}/approve_and_replace',
        'DashboardController@approveCookingRequestAndReplaceExisting'
    )->name('cooking_request.approve_and_replace');
});

Route::middleware(['auth', 'role:admin'])->namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', 'DashboardController@index')->name('index');
});
