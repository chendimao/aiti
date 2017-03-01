<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;


use App\Question;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories;
use Illuminate\Support\Facades\Input;

class QuestionsController extends Controller
{
    protected $questionRepository;
    protected $userRepository;
    protected $answersRepository;
    protected $ToggleFollower;
    //验证
    public function __construct(Repositories\QuestionRepository $questionRepository,Repositories\UserRepository $userRepository,Repositories\AnswersRepository $answersRepository)
    {
        $this->questionRepository=$questionRepository;
        $this->userRepository=$userRepository;
        $this->answersRepository=$answersRepository;
        $this->middleware('auth')->except('index','show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type=$request->get('order');



        $questions=$this->questionRepository->getQuestionsFeed($type);
        $notifications=$this->questionRepository->Notifications();


        $res=$this->QuestionList($request,$questions);

        $questions=$res['question'];
        $paginator=$res['paginator'];




        return view('questions.index',compact(['questions','paginator','notifications']));




       // dd($questions);
      //  $answers=$this->questionRepository->byIdWithTopicsAndAnswers();
//        foreach($questions as $question){
//            dd($question);
//        }
      //  dd($questions);

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

        if($question===null){
            return redirect('/');
             }


        $question->browse_count=$question->browse_count+1;



        // dd($question);

        Question::where('id',$id)->update(['browse_count'=>$question->browse_count]);

        return view('questions.show',compact('question'));

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


    //用户关注问题

    public function UserFollower($question_id)
    {
        $user=\Auth::guard('api')->user();

        $followed=!!$user->IsFollower($user->id,$question_id)->count();
        //  $followed=\App\Follow::where('user_id',$user->id)->where('question_id',$request->get('question'))->count();

        if($followed){
            return response()->json(['followed'=>true]);
        }else{
            return response()->json(['followed'=>false]);
        }
    }


    public function ToggleFollow($question_id)
    {
        $user=\Auth::user();

        $question=\App\Question::find($question_id);
        $followed=$user->IsFollower($user->id,$question->id)->first();
        //$followed=\App\Follow::where('user_id',$user->id)->where('question_id',$request->get('question'))->first();

        if($followed!==null){

            $question->decrement('followers_count');
            $followed->delete();
            return response()->json(['followed'=>false]);
        }
        $data=[$user->id=>$question->id];
        $user->belongsToManyFollower()->toggle($data);
        $question->increment('followers_count');
        return response()->json(['followed'=>true]);
    }


    public function test()
    {
        echo 2342;
    }


    //分页

    function QuestionList(Request $request,$data) {


        $data= $data->toArray();
        $perPage = 5;
        if (!empty($request->page)) {
            $current_page = $request->page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }

        $item = array_slice($data, ($current_page-1)*$perPage, $perPage); //按分页取数据
        $total = count($data);
        //也可以这样
        //$paginator=new LengthAwarePaginator($item, $total, $perPage);
        // $paginator=$paginator->setPath(route('admin.wxmenu.index'));
        $paginator =new \Illuminate\Pagination\LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),  //设定个要分页的url地址。也可以手动通过 $paginator ->setPath(‘路径’) 设置
            'pageName' => 'page',
        ]);
        $paginator->setPath('?order='.$request->get('order'));
        $question = $paginator->toArray()['data'];



        return ['question'=>$question,'paginator'=>$paginator];
    }




}
