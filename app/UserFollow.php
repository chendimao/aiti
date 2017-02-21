<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    protected $table='followers';
    protected $fillable=[
      'follower_id','followed_id'
    ];
}
