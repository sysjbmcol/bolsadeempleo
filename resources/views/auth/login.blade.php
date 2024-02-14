@extends('layouts.index')

@section('imports')
    <link rel="stylesheet" href="{{ asset('css/incio_sesion.css') }}">
@endsection

@section('title', 'Inicia Sesión | TGL')

@section('content')
<body class="d-flex justify-content-center align-items-center vh-100">
    <div
      class="container d-flex rounded-5 box-shadow-57 h-75 max-width-900 m-2"
    >
      <div
        class="w-50 d-flex justify-content-center align-items-center rounded-start-5 flex-column p-4 bg-dark text-light"
      >
        <h2 class="fs-2">Bienvenido</h2>
  
        <p class="m-3 text-center">
          para unirte a nuestra comunidad por favor inicia sesion con tus datos
        </p>
        <input
          type="button"
          class="btn btn-outline-light w-50 rounded-5 mt-3"
          value="Iniciar sesión"
        />
      </div>
  
      <div
        class="d-flex justify-content-center align-items-center w-50 rounded-end-5 bg-light text-center"
      >
        <div class="py-4">
          <h2 class="fs-2">Crear cuenta</h2>
          <div class="m-3">
            <i
              class="bx bxl-google border border-secondary p-3 m-1 fs-4 rounded-circle cursor-pointer "
            ></i>
            <i
              class="bx bxl-github border border-secondary p-3 m-1 fs-4 rounded-circle cursor-pointer"
            ></i>
            <i
              class="bx bxl-linkedin  border border-secondary p-3 m-1 fs-4 rounded-circle cursor-pointer"
            ></i>
          </div>
          <p>Ingresa tu correo para registrarte</p>
          <form
            class="d-flex justify-content-center align-items-center flex-column"
          >
            <div class="input-group flex-nowrap mb-4">
              <span
                class="input-group-text border border-dark"
                id="addon-wrapping"
              >
                <i class="bx bxs-user"></i>
              </span>
              <input
                type="text"
                class="form-control border border-dark"
                placeholder="Nombre Completo"
                aria-label="Nombre Completo"
                aria-describedby="addon-wrapping"
              />
            </div>
  
            <div class="input-group flex-nowrap mb-4">
              <span
                class="input-group-text border border-dark"
                id="addon-wrapping"
              >
                <i class="bx bxs-envelope"></i>
              </span>
              <input
                type="text"
                class="form-control border border-dark"
                placeholder="Correo Electronico"
                aria-label="Correo Electronico"
                aria-describedby="addon-wrapping"
              />
            </div>
  
            <div class="input-group flex-nowrap mb-4">
              <span
                class="input-group-text border border-dark"
                id="addon-wrapping"
                ><i class="bx bxs-lock-open"></i
              ></span>
              <input
                type="text"
                class="form-control border border-dark"
                placeholder="Contraseña"
                aria-label="Contraseña"
                aria-describedby="addon-wrapping"
              />
            </div>
  
            <input
              type="submit"
              class="btn btn-outline-dark mt-3 w-75 rounded-5"
              value="Registrarse"
            />
          </form>
        </div>
      </div>
    </div>
</body>
@endsection
