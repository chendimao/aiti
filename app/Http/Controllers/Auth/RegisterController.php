<?php

namespace App\Http\Controllers\Auth;

use App\Mailer\UserMailer;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Naux\Mail\SendCloudTemplate;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ],['name.require'=>'用户名不能为空','email.require'=>'邮箱不能为空','password.require'=>'密码不能为空','name.unique'=>'用户名已经存在','email.unique'=>'邮箱已经存在','password.confirmed'=>'两次密码不一致']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar'=>asset('resources/assets/images/avatar/default.png'),
            'confirmation_token'=>str_random(40),
            'password' => bcrypt($data['password']),
            'api_token'=>str_random(60),
        ]);

        $this->sendVerifyEmailTo($user);
        return $user;
    }


    private function sendVerifyEmailTo(User $user){
        // 模板变量
        (new UserMailer())->VerifyEmail($user);
    }
}
