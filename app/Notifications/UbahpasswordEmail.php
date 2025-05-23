<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UbahpasswordEmail extends Notification
{
    public $resetUrl;
    public $nama;  

    public function __construct($resetUrl, $nama)
    {
        $this->resetUrl = $resetUrl;
        $this->nama = $nama;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Kata Sandi SPARKING')
            ->view('email.reset_password', [
                'nama' => $this->nama,
                'resetUrl' => $this->resetUrl,
            ]);
    }
}
