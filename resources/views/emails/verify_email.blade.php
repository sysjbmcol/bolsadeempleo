<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo de Bienvenida</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            margin: 0;
            padding: 0;
        }

        .text {
            width: 40%;
        }

        .container__img {
            margin-left: 25px;
            width: 55%;
        }

        .text_welcome {
            font-size: 15px;
        }

        .text__name {
            font-size: 50px;
        }

        .text__message {
            font-size: 15px;
        }

        .text__url {
            color: #000;
        }

        .text__button {
            display: inline-block;
            padding: 5px 15px;
            /* Ajusta el padding según tus necesidades */
            text-align: center;
            /* Centra el texto horizontalmente */
            line-height: 50px;
            /* Centra el texto verticalmente */
            background: #000;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            font-size: 18px;
        }

        .container__img_bienvenida {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <table cellspacing="0">
        <tr>
            <td class="text" style="padding-right: 20px;">
                <p class="text_welcome">{{ __('Bienvenido,') }}</p>
                <h1 class="text__name">{{ __(':nombre', ['nombre' => $nombre]) }}</h1>
                <p class="text__message">{{ $validateMessage }} <a href="{{ $url }}" class="text__url"
                        style="color: #000;">aquí.</a>
                    <br>
                    {{ $beneficios }}
                </p>

                <a href="{{ $url }}" class="text__button"
                    style="color: #fff; margin: auto;">{{ __('Verificar') }}</a>
            </td>

            <td class="container__img">
                <img src="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=606,h=496,fit=crop/mPoyZVg96EI62K0E/joel-filipe-unsplash-YlZPLyOrnxigROG5.jpg"
                    alt="Imagen de Bienvenida" class="container__img_bienvenida">
            </td>
        </tr>
    </table>
</body>

</html>
