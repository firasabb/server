<?php

use Illuminate\Http\Request;

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

Route::get('/word/{word}', 'WordController@getWordApi')->name('getWordApi')->middleware('cors');

Route::get('/{language}/words', 'WordController@getWordsLanguage')->name('getWordsLanguage')->middleware('cors');

Route::get('/language/{language}', 'LanguageController@getLanguage')->middleware('cors')->name('getLanguage');

Route::get('/languages', 'LanguageController@getLanguages')->middleware('cors')->name('getLanguages');

Route::get('/words', 'WordController@getWordsApi')->name('getWordsApi')->middleware('cors');

Route::post('/downloader', 'DownloaderController@createDownloader')->name('createDownloader')->middleware('cors');

Route::get('/downloader/{email}', 'DownloaderController@getDownloader')->name('getDownloader')->middleware('cors');
