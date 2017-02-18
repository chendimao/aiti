<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswersRequest;
use App\Repositories\AnswersRepository;
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
            'question_id'=>$question,
            'user_id'=>Auth::id(),
            'body'=>$request->get('body'),
        ]);
        $answer->belongsToQuestion()->increment('answers_count');
        return back();
        }
    
}
