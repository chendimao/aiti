<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    protected $fillable=[
        'name','questions_count','followers_count'
    ];

    public function belongsToManyQuestion()
    {
        return $this->belongsToMany(Question::class,'question_topic')->withTimestamps();
    }
}
