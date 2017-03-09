<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Repositories;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    public $userRepository;
    public $questionRepository;
    public function __construct(Repositories\UserRepository $userRepository,Repositories\QuestionRepository $questionRepository)
    {
        $this->userRepository=$userRepository;
        $this->questionRepository=$questionRepository;
        $this->middleware('auth:web');
    }


    //用户首页
    public function index()
    {
        $user=$this->userRepository->ById(\Auth::user()->id);



        $question=collect();

        foreach($user->belongsToManyAnswer as $users) {
            $question[] = $this->questionRepository->ById($users['question_id']);

        }
        return view('users.index',compact('user','question'));
    }

    public function show($id)
    {
        echo "this is show";
    }

    //编辑用户信息

    public function edit($id)
    {


        if($id!=\Auth::user()->id){
            return back();
        }

        $user=$this->userRepository->ById($id);

        return view('users.set',compact('user'));
    }


    public function store(Request $request)
    {
        dd($request->all());
    }


    //更新用户信息

    public function update(Request $request,$id)
    {

        $input=$request->except('_method','_token');
        $res=$this->userRepository->getUser($id)->update($input);

      if($res){
          return $res;
      }else{
          return false;
      }

    }
    
    //上传用户头像

    public function UpUserAvatar(Request $request)
    {

        dd($request->all());
    }



}
