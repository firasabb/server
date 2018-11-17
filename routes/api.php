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

Route::get('/word/{word}', 'WordController@getWordApi')->name('getWordApi');

Route::get('/{language}/words', 'WordController@getWordsLanguage')->name('getWordsLanguage');

Route::get('/language/{language}', 'LanguageController@getLanguage')->name('getLanguage');

Route::get('/languages', 'LanguageController@getLanguages')->name('getLanguages');

Route::get('/words', 'WordController@getWordsApi')->name('getWordsApi');

Route::post('/downloader', 'DownloaderController@createDownloader')->name('createDownloader');

Route::get('/downloader/{email}', 'DownloaderController@getDownloader')->name('getDownloader');
