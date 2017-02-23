<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\AnswersRequest;
use App\Repositories\AnswersRepository;
use App\User;
use Illuminate\Http\Request;
use Auth;

class AnswersController extends Controller
{
    protected $answers;

    public function __construct(AnswersRepository $answers)
    {
        $this->answers=$answers;
        $this->middleware('auth');
    }
    
    public function store(AnswersRequest $request,$question){


        $answer=$this->answers->create([
            'user_id'=>Auth::id(),
            'question_id'=>$question,
            'body'=>$request->get('body'),
        ]);

        $answer->belongsToQuestion()->increment('answers_count');

        return back();
        }

    public function commend($answer_id){

        $user=\Auth::guard('api')->user();

        $Commend=$this->answers->IsCommend($user->id,$answer_id);
        $CountCommend=$this->answers->CountCommend($answer_id)->first();

        if($Commend!==null){
            return response()->json(['CountCommend'=>$CountCommend->votes_count,'commend'=>true]);
        }

            return response()->json(['CountCommend'=>$CountCommend->votes_count,'commend'=>false]);





    }

    public function ToggleCommend($answer_id){

        $user=\Auth::guard('api')->user();
        $answer=Answer::find($answer_id);
        $Commend=$this->answers->IsCommend($user->id,$answer_id);

       // dd($user->id.'---'.$answer_id);
            $z=$answer->belongsToManyCommend()->toggle([$answer_id=>$user->id]);

        $now_id=$this->answers->byId($answer_id);


        if($z['attached']==null){
                $now_id->decrement('votes_count');
            $CountCommend=$this->answers->CountCommend($answer_id)->first();
            return response()->json(['CountCommend'=>$CountCommend->votes_count,'Commend'=>false]);
            }else{
                $now_id->increment('votes_count');
            $CountCommend=$this->answers->CountCommend($answer_id)->first();
            return response()->json(['CountCommend'=>$CountCommend->votes_count,'Commend'=>true]);
            }


    }
    
}
