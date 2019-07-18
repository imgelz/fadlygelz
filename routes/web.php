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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/admin', function () {
//     return view('backend');
// });


route::get('/', 'FrontendController@index');

route::get('archive-page', 'FrontendController@archive');

route::get('single-post', 'FrontendController@singlepost');

// Route::get('/single-post', function () {
//     return view('frontend.single-post');
// });
Route::get('/faqs', function () {
    return view('frontend.faqs');
});
Route::get('/faqs-single', function () {
    return view('frontend.faqs-single');
});
Route::get('/contact-us', function () {
    return view('frontend.contact-us');
});

Route::get('dashboardfrontend', function () {
    return view('dashboardfrontend');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],
function (){
    Route::get('/', function(){
        return view('backend.index');
    });
    Route::resource('kategori', 'KategoriController');
    Route::resource('tag', 'TagController');
    Route::resource('artikel', 'ArtikelController');
});

Route::get('berita-terakhir','FrontendAPIController@beritaterakhir');
