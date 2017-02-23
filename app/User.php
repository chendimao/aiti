<?php

namespace App;

use App\Mailer\UserMailer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Naux\Mail\SendCloudTemplate;
use Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','confirmation_token','api_token'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function owns(Model $request){
            return $this->id==$request->user_id;

    }


    public function hasManyAnswer(){
        return $this->hasMany(Answer::class);
    }

    public function sendPasswordResetNotification($token)
    {

        (new UserMailer())->passwordReset($token,$this->email);

    }



    //answers

    public function belongsToManyFollower(){
        return $this->belongsToMany(User::class,'users_questions','user_id','question_id')->withTimestamps();
    }

    public function IsFollower($UserId,$QuestionId){
        return Follow::where('user_id',$UserId)->where('question_id',$QuestionId);
    }


    //用户与用户之间的多对多关系
    public function belongsToManyFollowed()
    {
        return $this->belongsToMany(User::class,'followers','follower_id','followed_id')->withTimestamps();
    }


    public function IsUserFollower($follower_id,$followed_id){
        return UserFollow::where('follower_id',$follower_id)->where('followed_id',$followed_id);
    }

}
