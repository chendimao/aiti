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
    public function byIdWithFollower($id){
        return User::where('id',$id)->with('belongsToManyFollower')->first();

    }

    public function ById($id){
        return User::where('id',$id)->get();
    }


}