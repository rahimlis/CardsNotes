<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("cards","CardsController@index");
Route::get("cards/{card}","CardsController@show");
Route::post("cards/add","CardsController@add");
Route::get("cards/{card}/delete","CardsController@delete");

Route::post("cards/{card}/notes","NotesController@store");
Route::get("notes/{note}/edit","NotesController@edit");
Route::patch("notes/{note}","NotesController@update");
Route::get("notes/{note}/delete", "NotesController@delete");


Auth::routes();

Route::get('/home', 'HomeController@index');
