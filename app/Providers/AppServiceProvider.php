<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable,$url){
            $mail = new MailMessage;
            $mail->subject('Bienvenu !');
            $mail->markdown('emails.verify', ['url' => $url]);
            return $mail;
        });
    }

    public function register()
    {
        //
    }
}