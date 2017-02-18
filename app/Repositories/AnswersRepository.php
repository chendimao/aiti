<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/17 0017
 * Time: 22:59
 */

namespace App\Repositories;


use App\Answer;

class AnswersRepository
{

    public function byIdWithFollower($id){

             return User::where('id',$id)->with('belongsToManyFollower')->get();

            }
}