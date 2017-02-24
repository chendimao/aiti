<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $message;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->message=$messageRepository;

    }

    public function store()
    {

        $message=$this->message->create([
            'from_user_id'=>\Auth::guard('api')->user()->id,
            'to_user_id'=>request('user'),
            'body'=>request('body')

        ]);

        if($message){
            return response()->json(['status'=>true]);

        }
        return response()->json(['status'=>true]);

    }
}
