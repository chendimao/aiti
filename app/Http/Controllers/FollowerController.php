<?php

namespace App\Http\Controllers;

use App\Notifications\NewUserFollowNotfication;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function index($auth_id)
    {

        $user=\Auth::guard('api')->user();

        // $followed=!!$user->IsUserFollower($user->id,$request->get('user'))->count();
        $followed=$user->IsUserFollower($user->id,$auth_id)->count();
        //   dd($user->id.'----'.$request->get('user'));
        if($followed){
            return response()->json(['followed'=>true]);
        }else{
            return response()->json(['followed'=>false]);
        }

    }

    public function followed($auth_id){
        $UserFollow=\Auth::guard('api')->user();

        $user=\App\User::find($auth_id);

        //$followed=!!$user->IsUserFollower($UserFollow->id,$request->get('user'))->first();
        $followed=$UserFollow->IsUserFollower($UserFollow->id,$auth_id)->first();
        //dd($UserFollow->id.'----'.$request->get('user'));
        if($followed!==null){
            //关注通知
            $user->notify(new NewUserFollowNotfication());


            $user->decrement('following_count');
            $followed->delete();
            return response()->json(['followed'=>false]);
        }
        $data=[$UserFollow->id=>$auth_id];

        $UserFollow->belongsToManyFollowed()->toggle($data);
        $user->increment('following_count');
        return response()->json(['followed'=>true]);
    }
}
