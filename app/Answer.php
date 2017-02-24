<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table='answers';
    protected $fillable=[
    'user_id','question_id','body','votes_count'
    ];

    public function belongsToUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function belongsToQuestion(){
        return $this->belongsTo(Question::class,'question_id');
    }

    public function belongsToManyCommend()
    {
        return $this->belongsToMany(User::class,'answers_users','answers_id')->withTimestamps();
    }


    public function comments(){

        return $this->morphMany(Comment::class,'commentable');

    }





}
