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

    public function belongsToManyTopic()
    {
        return $this->belongsToMany(Topic::class,'question_topic')->withTimestamps();
    }
}
