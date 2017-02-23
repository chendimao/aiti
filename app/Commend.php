<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commend extends Model
{
    protected $table='answers_users';
    protected $fillable=[
        'user_id','answers_id'
    ];
}
