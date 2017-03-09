<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/18 0018
 * Time: 11:20
 */

namespace App\Repositories;


use App\Follow;
use App\User;

class UserRepository
{
    //获取用户关注的问题
    public function byIdWithFollower($id){
        return User::where('id',$id)->with('belongsToManyFollower')->first();

    }

    //获取单个用户信息
    public function ById($id){
        return User::where('id',$id)->with('hasManyQuestion','belongsToManyAnswer')->first();
    }

    //获取所有用户信息
    public function getAll()
    {
        return User::get();
    }

    //获取用户发布的问题

    public function getUserToQuestion($id)
    {
        return User::where('id',$id)->belongsToManyQuestion();
    }

    //获取用户
    public function getUser($id)
    {
        return User::where('id',$id);
    }





}