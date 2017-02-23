<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/17 0017
 * Time: 22:59
 */

namespace App\Repositories;


use App\Answer;
use App\Commend;
use App\User;

class AnswersRepository
{

    public function byIdWithFollower($id){

             return User::where('id',$id)->with('belongsToManyFollower')->get();

            }

    public function create(array $attribute)
    {

        return Answer::create($attribute);
    }

    public function byIdWithUser($id){

        return Answer::where('id',$id)->with('belongsToQuestion')->get();

    }

    public function byIdWithCommend($id)
    {
        return Answer::where('id',$id)->with('belongsToManyCommend')->get();
    }

    public function IsCommend($user_id,$answer_id)
    {
        return Commend::where('user_id',$user_id)->where('answers_id',$answer_id)->first();
    }

    public function CountCommend($answer_id){
        return Answer::where('id',$answer_id)->select('votes_count');
    }

    public function byId($answer_id)
    {
        return Answer::find($answer_id);
    }

}