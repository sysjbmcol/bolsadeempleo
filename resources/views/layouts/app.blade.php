<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- CSS FILES -->        
     <link rel="preconnect" href="https://fonts.googleapis.com">  
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">     
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">       

        <link href="{{ asset('template/css/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('template/css/style.css') }}" rel="stylesheet"> 

    <title>Bolsa de empleo | TGL</title>
</head>
<style>
    .header {
        background: black;
        width: 100%;
        height: 100px;
        color: white;
        display: flex;
        justify-content: flex-end;
        align-items: stretch;

    }

    .login {
        text-decoration: none;
        color: white;
        height: 40px;
        width: 100px;
        text-align: center;

        display: flex;
        justify-content: center;
        align-items: center;
        background: red;
        margin: 15px;
    }
</style>

<body>
    <header class="header">
        <a href="{{route("index")}}" class="login"> {{ __('Home') }} </a>
        @if (!Auth::user())
            <a href="{{ route('login') }}" class="login">{{ __('Login') }}</a>
            <a href="{{ route('register') }}" class="login">{{ __('Register') }}</a>
        @else
            <a href="{{ route('logout') }}" class="login"> {{ __('Logout') }} </a>
        @endif
    </header>
    <main class="main">
        @yield('content')

    </main>
    <footer class="footer">

    </footer>
    @yield('script')
</body>

</html>
