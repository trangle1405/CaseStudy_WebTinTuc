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

Route::get('/', 'HomeController@index');
Route::get('category/{id}/{name_slug}.html', 'HomeController@typeOfNews');
Route::get('news/{id}/{title_slug}.html', 'HomeController@news');
Route::post('comment/{id}', 'HomeController@comment');
Route::get('login', 'HomeController@getLOgin');
Route::post('login', 'HomeController@postLogin');
Route::get('logout', 'HomeController@logout');
Route::get('user_info', 'HomeController@getUserInfo');
Route::post('user_info', 'HomeController@postUserInfo');
Route::get('register', 'HomeController@getRegister');
Route::post('register', 'HomeController@postRegister');

Route::get('search', 'HomeController@search');



Route::get('admin/login', 'UserController@getAdminLogin');
Route::post('admin/login', 'UserController@postAdminLogin');
Route::get('admin/logout', 'UserController@Logout');


route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    // Route group category
    route::group(['prefix' => 'category'], function () {
        Route::get('list', 'CategoryController@list');
        Route::get('add', 'CategoryController@create');
        Route::post('add', 'CategoryController@store');
        Route::get('edit/{id}', 'CategoryController@edit');
        Route::post('edit/{id}', 'CategoryController@update');
        Route::get('delete/{id}', 'CategoryController@destroy');
    });

    // Route group Type of News
    route::group(['prefix' => 'typeofnews'], function () {
        Route::get('list', 'TypeOfNewsController@list');
        Route::get('add', 'TypeOfNewsController@create');
        Route::post('add', 'TypeOfNewsController@store');
        Route::get('edit/{id}', 'TypeOfNewsController@edit');
        Route::post('edit/{id}', 'TypeOfNewsController@update');
        Route::get('delete/{id}', 'TypeOfNewsController@destroy');
    });

    // Route group News
    route::group(['prefix' => 'news'], function () {
        Route::get('list', 'NewsController@list');
        Route::get('add', 'NewsController@create');
        Route::post('add', 'NewsController@store');
        Route::get('edit/{id}', 'NewsController@edit');
        Route::post('edit/{id}', 'NewsController@update');
        Route::get('delete/{id}', 'NewsController@destroy');
    });

    // Route group Comment
    route::group(['prefix' => 'comment'], function () {
        Route::get('delete/{id}/{news_id}', 'CommentController@destroy');
    });


    // Route group Slide
    route::group(['prefix' => 'slide'], function () {
        Route::get('list', 'SlideController@list');
        Route::get('add', 'SlideController@create');
        Route::post('add', 'SlideController@store');
        Route::get('edit/{id}', 'SlideController@edit');
        Route::post('edit/{id}', 'SlideController@update');
        Route::get('delete/{id}', 'SlideController@destroy');
    });

    // Route group User
    route::group(['prefix' => 'user'], function () {
        Route::get('list', 'UserController@list');
        Route::get('add', 'UserController@create');
        Route::post('add', 'UserController@store');
        Route::get('edit/{id}', 'UserController@edit');
        Route::post('edit/{id}', 'UserController@update');
        Route::get('delete/{id}', 'UserController@destroy');
    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('typeofnews/{category_id}', 'AjaxController@getTypeOfNews');
//        Route::get('timestamp','AjaxController@timestamp');
    });
});

