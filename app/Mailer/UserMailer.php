<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22 0022
 * Time: 19:37
 */

namespace App\Mailer;
use Auth;

class UserMailer extends Mailer
{
    public function FollowNotify($email)
    {
        // 模板变量
        $bind_data = [
            'url' => url('http://aiti.xin/'),
            'name'=>Auth::guard('api')->user()->name
        ];

        $this->sendTo('aiti_new_user_follow',$email,$bind_data);
    }


    public function passwordReset($token,$email){
        $bind_data = [
            'url' => url('password/reset', $token),
        ];

        $this->sendTo('aiti_reset_password',$email,$bind_data);
    }


    public function VerifyEmail($user)
    {
        $bind_data = [
            'url' => route('email.verify',['confirmation_token'=>$user->confirmation_token]),
            'name'=>$user->name,
        ];

        $this->sendTo('aiti_register',$user->email,$bind_data);
    }
}