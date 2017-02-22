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
            'user_id'=>Auth::id(),
            'question_id'=>$question,
            'body'=>$request->get('body'),
        ]);

        $answer->belongsToQuestion()->increment('answers_count');

        return back();
        }
    
}
