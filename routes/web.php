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






