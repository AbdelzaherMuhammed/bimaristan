<?php

namespace App\Notifications;

use App\Models\Student;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ForgetPasswordNotification extends Notification
{
    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your reset code is ' . $notifiable->pin_code)
//            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
