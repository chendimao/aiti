<?php

namespace App\Notifications;

use App\Channels\SendCloudChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Auth;
use Naux\Mail\SendCloudTemplate;
use Mail;


class NewUserFollowNotfication extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database',SendCloudChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }


    public function toDatabase($notifiable)
    {
        return [
            'name'=>Auth::guard('api')->user()->name,
        ];
    }

    public function toSendCloud($notifiable)
    {
        // 模板变量
        $bind_data = [
            'url' => url('http://aiti.xin/'),
            'name'=>Auth::guard('api')->user()->name
        ];
        $template = new SendCloudTemplate('aiti_new_user_follow', $bind_data);


        Mail::raw($template, function ($message) use($notifiable) {
            $message->from('admin@aiti.xin', '爱提网');

            $message->to($notifiable->email);
        });
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}