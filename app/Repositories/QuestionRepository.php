<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/17 0017
 * Time: 10:54
 */

namespace App\Repositories;


use App\Answer;
use App\Notifications;
use App\Question;
use App\Topic;
use App\User;

class QuestionRepository
{

    public function byIdWithTopicsAndAnswers($id){
        return Question::where('id',$id)->with(['belongsToManyTopic','hasManyAnswer','belongsToUser'])->first();



    }





    public function create(array $attribute)
    {
        return Question::create($attribute);
    }


    public function getQuestionsFeed($order){

        if($order=='hot'){
            $type='answers_count';
        }elseif($order=='empty'){
            $type='comments_count';
            return Question::published()->where('comments_count',0)->with('belongsToUser','hasManyAnswer','belongsToManyTopic')->get();
        }elseif($order=='my'){
            return Question::published()->where('user_id',\Auth::user()->id)->with('belongsToUser','hasManyAnswer','belongsToManyTopic')->get();

        }else{
            $type='updated_at';
        }

        return Question::published()->latest($type)->with('belongsToUser','hasManyAnswer','belongsToManyTopic')->get();
    }





    public function normalizeTopic(array $topics){



        return collect($topics)->map(function ($topic){




            if(is_numeric($topic)){
                Topic::find($topic)->increment('questions_count');

                return $topic;
            }

            if($res=Topic::where('name',$topic)->first()){

                $res->increment('questions_count');
                return $res->id;

            }


            $newTopic=Topic::create(['name'=>$topic,'questions_count'=>1]);

            return $newTopic->id;


        })->toArray();
    }


    public function ById($id){
        return Question::find($id);
    }


    public function byIdWithFollower($id){
        return User::where('id',$id)->with('belongsToManyFollower')->get();
    }
    


//    public function byIdWithCommend($id){
//        return Answer::where('id',$id)->with('belongsToManyCommend')->get();
//    }


        public function Notifications(){
            return Notifications::latest('updated_at')->first();
        }




}