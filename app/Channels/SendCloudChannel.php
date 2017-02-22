<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22 0022
 * Time: 14:14
 */

namespace App\Channels;


use Illuminate\Notifications\Notification;

class SendCloudChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message=$notification->toSendCloud($notifiable);
    }
}