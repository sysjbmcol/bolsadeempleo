<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Notification
{

    public static $createUrlCallback;
    public $nombre;

    function __construct($nombre)
    {
        $this->nombre = $nombre;
    }


    public static $toMailCallback;

    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return $this->buildMailMessage($verificationUrl, $this->nombre);
    }


    protected function buildMailMessage($url, $nombre)
    {
        return (new MailMessage)
            ->subject(Lang::get('Verify Email Address'))
            ->action(Lang::get('Verificar'), $url)
            ->view('emails.verify_email', [
                'url' => $url,
                'nombre' => $nombre,
                'validateMessage' => "Ahora solo debes validar tu cuenta, haciendo clic ",
                'beneficios' =>
                "Una vez realices la validación de tu cuenta, podrás acceder a todos los beneficios de la bolsa de empleo."
            ]);
    }


    protected function verificationUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable);
        }

        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
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
