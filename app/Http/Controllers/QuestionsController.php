<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories;
class QuestionsController extends Controller
{
    protected $questionRepository;
    protected $userRepository;
    protected $ToggleFollower;
    //验证
    public function __construct(Repositories\QuestionRepository $questionRepository,Repositories\UserRepository $userRepository)
    {
        $this->questionRepository=$questionRepository;
        $this->userRepository=$userRepository;
        $this->middleware('auth')->except('index','show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=$this->questionRepository->getQuestionsFeed();

        return view('questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {

        //
        $topics=$this->questionRepository->normalizeTopic($request->get('topics'));


        $data=[
            'title'=>$request->get('title'),
            'body'=>$request->get('body'),
            'user_id'=>\Auth::id()
        ];
        $question=$this->questionRepository->create($data);
        $question->belongsToManyTopic()->attach($topics);
        return redirect()->route('questions.show',[$question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $question=$this->questionRepository->byIdWithTopicsAndAnswers($id);



        return view('questions.show',compact('question'));

    }

    public function follower($id)
    {
        $UserId=Auth::user()->id;
        $data=[$UserId=>$id];
        $follower=$this->userRepository->byIdWithFollower($UserId);
        $follower->belongsToManyFollower()->toggle($data);

      return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $question=$this->questionRepository->ById($id);
        //判断编辑者是否为问题发起者
        if(Auth::user()->owns($question)){
            return view('questions.edit',compact('question'));
        }

        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $questions=$this->questionRepository->ById($id);
        $topic=$this->questionRepository->normalizeTopic($request->get('topics'));
        $questions->update([
            'title'=>$request->get('title'),
            'body'=>$request->get('body'),

        ]);

        $questions->belongsToManyTopic()->sync($topic);

        return redirect()->route('questions.show',[$questions->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions=$this->questionRepository->ById($id);

        if(Auth::user()->owns($questions)){
            $questions->delete();
            return redirect('/');
        }

        abort(403,'Forbidden');
    }




}
