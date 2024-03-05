<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{

    public $token;
    public $nombre;


    public static $createUrlCallback;

    public static $toMailCallback;


    public function __construct($token, $nombre)
    {
        $this->token = $token;
        $this->nombre = $nombre;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        return $this->buildMailMessage($this->resetUrl($notifiable), $this->nombre);
    }


    protected function buildMailMessage($url, $nombre)
    {
        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->action(Lang::get('Restablecer'), $url)
            ->view('emails.reset_password', [
                'url' => $url, 'nombre' => $nombre, 'resetMessage' => Lang::get('Hemos recibido tu solicitud para recuperar tu acceso a la bolsa de empelo. Haz clic en el botón "Restaurar" para crear una nueva contraseña.'),
                'expira' => ':count minutos.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]
            ]);
    }


    protected function resetUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        }

        return url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }


    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }


    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
