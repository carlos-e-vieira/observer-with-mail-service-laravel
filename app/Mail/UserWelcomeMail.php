<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $frontendUrl;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build(): self
    {
        return $this->view('notifications.user-welcome')
            ->with([
                'name' => $this->user->name,
                'email' => $this->user->email,
                'frontendUrl' => config('app.frontend_url'),
            ])
            ->subject('Bem-vindo ao Sistema');
    }
}
