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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['as' => 'api.notes.','prefix' => 'notes', 'middleware' => ['web']], function() {
    Route::get('/{id}', 'NoteController@index')->name('note.index');
    Route::post('/store', 'NoteController@store')->name('note.post');
    Route::patch('/update/{note}', 'NoteController@update')->name('note.update');
    Route::post('/search', 'NoteController@search')->name('note.search');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

