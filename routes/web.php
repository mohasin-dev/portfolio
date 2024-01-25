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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');
    Route::resource('skill','SkillController');
    Route::resource('service','ServiceController');
    Route::resource('testimonial','TestimonialController');
    Route::resource('study','StudyController');
    Route::resource('experience','ExperienceController');
    Route::resource('counter','CounterController');
    Route::resource('blog','BlogController');
    Route::resource('social-link','SocialLinkController');

    Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');

    Route::get('profile','DashboardController@adminProfile')->name('profile.index');
    Route::get('profile/edit/{id}','DashboardController@edit')->name('profile.edit');
    Route::put('profile-update/{id}','DashboardController@update')->name('profile.update');

    Route::get('profile/password-edit','DashboardController@editPassword')->name('password.edit');
    Route::put('profile/password-update','DashboardController@updatePassword')->name('password.update');

    Route::get('settings','SettingController@index')->name('settings.index');
    Route::get('settings/edit/{id}','SettingController@edit')->name('settings.edit');
    Route::put('settings/update/{id}','SettingController@update')->name('settings.update');
});

Route::post('subscriber','SubscriberController@store')->name('subscriber.store');
Route::post('contact','ContactController@store')->name('contact.store');
