<?php

/**
 * HomeController
 */
Route::get('/', 'HomeController@index')->name('home');

/**
 * AuthController
 */
Auth::routes();

/**
 * UserGroupController
 */
Route::resource('user-group', 'UserGroupController');

/**
 * UserController
 */
Route::resource('user', 'UserController');

/**
 * CustomerController
 */
Route::resource('customer', 'CustomerController');

/**
 * DistributorController
 */
Route::resource('distributor', 'DistributorController');

/**
 * UnitController
 */
Route::resource('unit', 'UnitController');

/**
 * ProductController
 */
Route::resource('product', 'ProductController');

/**
 * ProductCategoryController
 */
Route::resource('product-category', 'ProductCategoryController');

/**
 * TransactionController
 */
Route::prefix('transaction')->group(function () {
    Route::post('/', 'TransactionController@store')->name('transaction.store');
    Route::get('/selling', 'TransactionController@allSelling')->name('transaction.selling.index');
    Route::get('/buying', 'TransactionController@allBuying')->name('transaction.buying.index');
    Route::get('/{transaction}', 'TransactionController@show')->name('transaction.show');
    Route::get('/selling/{transaction}', 'TransactionController@showSelling')->name('transaction.show.selling');
    Route::get('/buying/{transaction}', 'TransactionController@showBuying')->name('transaction.show.buying');
    Route::delete('/{transaction}', 'TransactionController@destroy')->name('transaction.destroy');
});

/**
 * PrintController
 */
Route::prefix('print')->group(function () {
    Route::post('/transaction', 'PrintController@printTransaction')->name('print.transaction');
});