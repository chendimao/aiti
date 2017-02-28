<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Comment;
use App\Question;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    
    public function answer($id)
    {
        $answer=Answer::with('comments','comments.belongsToUser')->where('id',$id)->first();

        $test=Answer::with('hasOneUser')->where('id',6)->first();

        dd($test);

        dd($answer->comments[1]);

        dd($answer);
    }


    public function question($id)
    {
        $question=Question::with('comments','comments.belongsToUser')->where('id',$id)->first();

        return $question;
    }


    public function store()
    {
        $model=$this->getModelNameFromType(request('type'));

        $comment=Comment::create([
            'commentable_id'=>request('id'),
            'commentable_type'=>$model,
            'user_id'=>\Auth::guard('api')->user()->id,
            'body'=>request('body')
        ]);

        return $comment;
    }



    private function getModelNameFromType($type){

        return $type==='question'?'App\Question':'App\Answer';

    }
    
    
}
