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
})->middleware('auth:api');


Route::get('/topics', function (Request $request) {
    $topics=\App\Topic::select(['id','name'])->where('name','like','%'.$request->query('q').'%')->get();
    return $topics;
})->middleware('api');


//用户关注问题

Route::post('/question/follower', function (Request $request) {
    $user=\Auth::guard('api')->user();
    $followed=!!$user->IsFollower($user->id,$request->get('question'))->count();
  //  $followed=\App\Follow::where('user_id',$user->id)->where('question_id',$request->get('question'))->count();

    if($followed){
       return response()->json(['followed'=>true]);
    }else{
        return response()->json(['followed'=>false]);
    }

})->middleware('auth:api');


Route::post('/question/ToggleFollow', function (Request $request) {
    $user=\Auth::guard('api')->user();
    $question=\App\Question::find($request->get('question'));
    $followed=$user->IsFollower($user->id,$question->id)->first();
    //$followed=\App\Follow::where('user_id',$user->id)->where('question_id',$request->get('question'))->first();

    if($followed!==null){

        $question->decrement('followers_count');
        $followed->delete();
        return response()->json(['followed'=>false]);
    }
    $data=[$user->id=>$question->id];
   $user->belongsToManyFollower()->toggle($data);
    $question->increment('followers_count');
    return response()->json(['followed'=>true]);

})->middleware('auth:api');


//用户关注作者

Route::post('/user/follower', function (Request $request) {
    $user=\Auth::guard('api')->user();
   // $followed=!!$user->IsUserFollower($user->id,$request->get('user'))->count();
      $followed=\App\UserFollow::where('follower_id',$user->id)->where('followed_id',$request->get('user'))->count();

    if($followed){
        return response()->json(['followed'=>true]);
    }else{
        return response()->json(['followed'=>false]);
    }

})->middleware('auth:api');



Route::post('/user/ToggleFollow', function (Request $request) {
    $UserFollow=\Auth::guard('api')->user();
    $user=\App\User::find($request->get('user'));

    //$followed=!!$user->IsUserFollower($UserFollow->id,$request->get('user'))->first();
    $followed=\App\UserFollow::where('follower_id',$user->id)->where('followed_id',$request->get('user'))->first();

    if($followed!==null){

        $user->decrement('followers_count');
        $followed->delete();
        return response()->json(['followed'=>false]);
    }
    $data=[$UserFollow->id=>$user->id];
    $user->belongsToManyFollowed()->toggle($data);
    $user->increment('followers_count');
    return response()->json(['followed'=>true]);

})->middleware('api');

