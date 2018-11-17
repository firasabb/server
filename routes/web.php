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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/panel', 'AdminController@index')->name('panel');


// WORDS

Route::get('/panel/words', 'WordController@index')->name('showWords')->middleware(['role:admin']);

Route::post('/panel/words/create', 'WordController@store')->name('storeWord')->middleware(['role:admin']);

Route::get('/panel/words/show/{id}', 'WordController@show')->name('showWord')->middleware(['role:admin']);

Route::put('/panel/words/show/{id}', 'WordController@update')->name('updateWord')->middleware(['role:admin']);

Route::delete('/panel/words/show/{id}', 'WordController@destroy')->name('deleteWord')->middleware(['role:admin']);


// LANGUAGES

Route::get('/panel/languages', 'LanguageController@index')->name('showLanguages')->middleware(['role:admin']);

Route::post('/panel/languages/create', 'LanguageController@store')->name('storeLanguage')->middleware(['role:admin']);

Route::get('/panel/languages/show/{id}', 'LanguageController@show')->name('showLanguage')->middleware(['role:admin']);

Route::put('/panel/languages/show/{id}', 'LanguageController@update')->name('updateLanguage')->middleware(['role:admin']);

Route::delete('/panel/languages/show/{id}', 'LanguageController@destroy')->name('deleteLanguage')->middleware(['role:admin']);



//CATEGORIES

Route::get('/panel/categories', 'CategoryController@index')->name('showCategories')->middleware(['role:admin']);

Route::post('/panel/categories/create', 'CategoryController@store')->name('storeCategory')->middleware(['role:admin']);

Route::get('/panel/categories/show/{id}', 'CategoryController@show')->name('showCategory')->middleware(['role:admin']);

Route::put('/panel/categories/show/{id}', 'CategoryController@update')->name('updateCategory')->middleware(['role:admin']);

Route::delete('/panel/categories/show/{id}', 'CategoryController@destroy')->name('deleteCategory')->middleware(['role:admin']);



// PHOTOS

Route::get('panel/photos', 'AdminController@photosPage')->name('photosPage');

Route::post('panel/photos/upload', 'AdminController@uploadPhoto')->name('uploadPhoto');

Route::delete('panel/photos/{photo}', 'AdminController@deletePhoto')->name('deletePhoto');


//Downloaders

Route::get('panel/downloaders', 'DownloaderController@index')->name('showDownloaders')->middleware(['role:admin']);

Route::post('/panel/downloaders/create', 'DownloaderController@store')->name('storeDownloader')->middleware(['role:admin']);

Route::get('panel/downloader/{email}', 'DownloaderController@show')->name('showDownloader')->middleware(['role:admin']);

Route::put('/panel/downloader/{email}', 'DownloaderController@update')->name('updateDownloader')->middleware(['role:admin']);

Route::delete('/panel/downloader/{email}', 'DownloaderController@destroy')->name('deleteDownloader')->middleware(['role:admin']);
