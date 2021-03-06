<?php
$DOMAIN = env('DOMAIN');

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
Route::group(['domain' => 'admin.' . $DOMAIN], function () {
    
//HomeController
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['module' => 'Home'],function (){
    Route::get('homepage', 'Admin\HomepageController@index');
});
// CMS management section
Route::group(['module' => 'cms'],function (){
    Route::get('cms', 'Admin\CmsController@index');
});

});