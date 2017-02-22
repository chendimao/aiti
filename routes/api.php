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


Route::post('/question/{question_id}/ToggleFollow','QuestionsController@ToggleFollow' )->middleware('api');


//用户关注作者

Route::get('/user/{auth_id}/follower', 'FollowerController@index')->middleware('api');



Route::post('/user/{auth_id}/ToggleFollow', 'FollowerController@followed')->middleware('api');

