<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class EmailChangeNotification extends Notification
{
    // use Queueable;

    /**
     * The user Email
     *
     * @var string
     */
    protected $userId;

    /**
     * Create a new notification instance.
     *
     * @param string $userId
     */
    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(AnonymousNotifiable $notifiable)
    {
        return (new MailMessage)->markdown('email.email-reset', [
            'notifiable' => $notifiable,
            'route' => $this->verifyRoute($notifiable)
        ]);
    }

    /**
     * Returns the Reset URl to send in the Email
     *
     * @param AnonymousNotifiable $notifiable
     * @return string
     */
    protected function verifyRoute(AnonymousNotifiable $notifiable)
    {
        return URL::temporarySignedRoute('verify.changed-email', 60 * 60, [
            'user' => $this->userId,
            'email' => $notifiable->routes['mail']
        ]);
    }
}