<?php

use Illuminate\Support\Facades\Route;

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

//Seafoods

Route::get('/Seafood', 'SeafoodController@SeafoodStore')->name('SeafoodStore');

Route::get('/Seafood/{id}', 'SeafoodController@Details')->name('SeafoodDetails');

Route::post('/Seafood/comment', 'SeafoodController@AddComment')->name('SeafoodsComments');

//Admin.Seafoods

Route::get('/admin/Seafood', 'SeafoodController@Index');

Route::get('/admin/Seafood/create', "SeafoodController@Create");

Route::post('/admin/Seafood/create', "SeafoodController@Store");

Route::get('/admin/Seafood/delete/{id}', "SeafoodController@Delete");

Route::get('/admin/Seafood/edit/{id}', "SeafoodController@Edit");

Route::get('/admin/Seafood/{id}', "SeafoodController@Show");

Route::post('/admin/Seafood/edit', "SeafoodController@Update");

Route::delete('/admin/Seafood/delete', "SeafoodController@Remove");


// Dessert

Route::get('/Dessert', 'DessertController@DessertStore')->name('DessertStore');

Route::get('/Dessert/{id}', 'DessertController@Details')->name('DessertDetails');

Route::post('/Dessert/comment', 'DessertController@AddComment')->name('DessertComments');

// Admin.Dessert

Route::get('/admin/Dessert', 'DessertController@Index');

Route::get('/admin/Dessert/create', "DessertController@Create");

Route::post('/admin/Dessert/create', "DessertController@Store");

Route::get('/admin/Dessert/delete/{id}', "DessertController@Delete");

Route::get('/admin/Dessert/edit/{id}', "DessertController@Edit");

Route::get('/admin/Dessert/{id}', "DessertController@Show");

Route::post('/admin/Dessert/edit', "DessertController@Update");

Route::delete('/admin/Dessert/delete', "DessertController@Remove");


// Drinks

Route::get('/Drinks', 'DrinkController@DrinkStore')->name('DrinkStore');

Route::get('/Drinks/{id}', 'DrinkController@Details')->name('DrinkDetails');

Route::post('/Drinks/comment', 'DrinkController@AddComment')->name('DrinksComments');

// Admin.Drinks

Route::get('/admin/Drinks', 'DrinkController@Index');

Route::get('/admin/Drinks/create', "DrinkController@Create");

Route::post('/admin/Drinks/create', "DrinkController@Store");

Route::get('/admin/Drinks/delete/{id}', "DrinkController@Delete");

Route::get('/admin/Drinks/edit/{id}', "DrinkController@Edit");

Route::get('/admin/Drinks/{id}', "DrinkController@Show");

Route::post('/admin/Drinks/edit', "DrinkController@Update");

Route::delete('/admin/Drinks/delete', "DrinkController@Remove");


// Appetizers

Route::get('/Appetizers', 'AppetizerController@AppetizerStore')->name('AppetizerStore');

Route::get('/Appetizers/{id}', 'AppetizerController@Details')->name('AppetizerDetails');

Route::post('/Appetizers/comment', 'AppetizerController@AddComment')->name('AppetizersComments');

// Admin.Appetizers

Route::get('/admin/Appetizers', 'AppetizerController@Index');

Route::get('/admin/Appetizers/create', "AppetizerController@Create");

Route::post('/admin/Appetizers/create', "AppetizerController@Store");

Route::get('/admin/Appetizers/delete/{id}', "AppetizerController@Delete");

Route::get('/admin/Appetizers/edit/{id}', "AppetizerController@Edit");

Route::get('/admin/Appetizers/{id}', "AppetizerController@Show");

Route::post('/admin/Appetizers/edit', "AppetizerController@Update");

Route::delete('/admin/Appetizers/delete', "AppetizerController@Remove");


Route::get('/mongodb', function () {
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

