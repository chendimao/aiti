<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function verify($token){

        //验证token，如果数据库中存在这个token，那么将is_active字段设置为1，登录用户

        $user=User::where('confirmation_token',$token)->first();

        if(is_null($user)){
                return redirect('/');
        }

        $user->is_active=1;
        $user->confirmation_token=str_random(40);
        $user->save();
        \Auth::login($user);
        return redirect('/home');
    }
}
