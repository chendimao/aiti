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
}
