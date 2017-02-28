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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('api');


Route::get('/topics', function (Request $request) {
    $topics=\App\Topic::select(['id','name'])->where('name','like','%'.$request->query('q').'%')->get();
    return $topics;
})->middleware('api');


//用户关注问题

Route::post('/question/{question_id}/follower', 'QuestionsController@UserFollower')->middleware('auth:api');


Route::post('/question/{question_id}/ToggleFollow','QuestionsController@ToggleFollow' )->middleware('auth:api');


//用户关注作者

Route::get('/user/{auth_id}/follower', 'FollowerController@index')->middleware('auth:api');



Route::post('/user/{auth_id}/ToggleFollow', 'FollowerController@followed')->middleware('auth:api');


//用户点赞
Route::get('/answer/{comment_id}/commend', 'AnswersController@commend')->middleware('auth:api');

Route::post('/answer/{comment_id}/ToggleCommend', 'AnswersController@ToggleCommend')->middleware('auth:api');


//发送私信

Route::post('/message/store','MessageController@store')->middleware('auth:api');


//评论问题&评论回答

Route::get('answer/{id}/comments','CommentsController@answer')->middleware('auth:api');
Route::get('question/{id}/comments','CommentsController@question')->middleware('auth:api');




