<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table='questions';

    public $fillable=[
      'title','body','user_id'
    ];

    //topics

    public function belongsToManyTopic()
    {
        return $this->belongsToMany(Topic::class,'question_topic')->withTimestamps();
    }


    public function belongsToUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function hasManyAnswer(){
        return $this->hasMany(Answer::class)->latest('updated_at');
    }

    public function scopePublished($query){
        return $query->where('is_hidden','F');
    }


    public function comments(){

        return $this->morphMany(Comment::class,'commentable');

    }








}
