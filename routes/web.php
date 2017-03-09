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

Route::get('/','QuestionsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('email/verify/{token}',['as'=>'email.verify','uses'=>'EmailController@verify']);

Route::resource('questions','QuestionsController',[
    'name'=>[
        'create'=>'questions.create',
        'show'=>'questions.show',
        'edit'=>'questions.edit',
        'index'=>'questions.index',
    ]
]);

Route::post('/questions/{question}/answer','AnswersController@store');
//Route::get('/questions/{id}/follower','QuestionsController@follower');


Route::get('notifications','NotificationsController@index');


//用户信息路由

Route::resource('user','UsersController');

//Route::get('user','UsersController@index');
//Route::post('user','UsersController@store');
//Route::put('user/{$user}/','UsersController@update');
//Route::get('/user/{$user}/edit/',function(){
//    echo "24234";
//});
//上传用户头像
Route::post('/user/upavatar','UsersController@UpUserAvatar');





