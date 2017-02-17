<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/17 0017
 * Time: 10:54
 */

namespace App\Repositories;


use App\Question;
use App\Topic;

class QuestionRepository
{

    public function byIdWithTopics($id){
        return Question::where('id',$id)->with('belongsToManyTopic')->first();
    }




    public function create(array $attribute)
    {
        return Question::create($attribute);
    }


    public function getQuestionsFeed(){

        return Question::published()->latest('updated_at')->with('belongsToUser')->get();
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

}