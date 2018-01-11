<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/','kosController@index');


Route::get('/about', function (){
    return view('about');
});

Route::get('/error-401', function (){
    return view('errors.401');
});

Route::get('/error-403', function (){
    return view('errors.403');
});

/*==========================================================================*/
Route::get('/register',function (){
    return view('auth.register');
})->middleware('check-auth');

Route::get('/login',function (){
    return view('auth.login');
})->middleware('check-auth');
/*==========================================================================*/

Route::get('/view/{id}','kosController@viewDetails');
Route::post('/doLogin','kosController@login');
Route::post('/doRegister','kosController@register');
Route::post('/search','kosController@search');

/*==========================================================================*/

Route::group(['middleware' => 'user-mdw'], function (){

    Route::get('/logout', 'kosController@doLogout');
    Route::post('/tambah-rating/{id}','kosController@tambahRating');

});
/*==========================================================================*/


Route::group(['middleware' => 'admin-mdw'], function (){

    Route::get('/tambah-kos', function (){
        return view('admin.add-kos');
    });
    /*===============================================================================*/
    Route::get('/manage-kos', 'kosController@manageKos');
    Route::get('/manage-user', 'kosController@manageUser');
    /*===============================================================================*/
    Route::get('/delete-user/{id}','kosController@deleteUser');
    Route::get('/delete-kos/{id}','kosController@deleteKos');
    /*===============================================================================*/
    Route::get('/update-user/{id}','kosController@updateUser');
    Route::get('/update-kos/{id}','kosController@updateKos');
    /*===============================================================================*/
    Route::get('/delete-photo/{id}/{photo_id}','kosController@deletePhoto');
    Route::get('/delete-review/{id}','kosController@deleteReview');
    /*===============================================================================*/

    Route::post('/tambah-kos','kosController@add');
    /*===============================================================================*/
    Route::post('/update-user/{id}','kosController@doUpdateUser');
    Route::post('/update-kos/{id}','kosController@doUpdateKos');
});



