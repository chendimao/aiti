<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table='answers';
    protected $fillable=[
    'user_id','question_id','body'
    ];

    public function belongsToUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function belongsToQuestion()
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }
}
