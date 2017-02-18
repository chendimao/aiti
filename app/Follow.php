<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table='users_questions';

    protected $fillable=[
        'user_id','question_id'
    ];
}
