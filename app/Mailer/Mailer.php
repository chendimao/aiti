<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22 0022
 * Time: 19:31
 */

namespace App\Mailer;


use Naux\Mail\SendCloudTemplate;
use Mail;
class Mailer
{
    protected function SendTo($template,$email,array $data)
    {

        $content = new SendCloudTemplate($template, $data);


        Mail::raw($content, function ($message) use($email) {
            $message->from('admin@aiti.xin', '爱提网');

            $message->to($email);
        });
    }
}