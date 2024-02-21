<!-- resources/views/emails/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>
        .text {
            width: 100%;
            text-align: center;
        }

        .text__name {
            font-size: 50px;
        }

        .text__message {
            font-size: 20px;
        }

        .text__button {
            display: inline-block;
            margin: 0 auto;
            padding: 5px 15px;
            text-align: center;
            line-height: 50px;
            background: #000;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="text">
        <h1 class="text__name">{{ __('Hola, :nombre', ['nombre' => $nombre]) }}</h1>
        <p class="text__message">
            {{ $resetMessage }}
        </p>

        <a href="{{ $url }}" class="text__button" style="color: #fff;">{{ __('Restablecer') }}</a>
    </div>
</body>

</html>
