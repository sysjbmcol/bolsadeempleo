const formularioRegistro = document.getElementById("formulario__registro");
const formularioInicioSesion = document.getElementById(
  "formulario__inicio_sesion"
);
const botonRegistro = document.getElementById("contenedor_registro__boton");
const botonInicioSesion = document.getElementById(
  "contenedor_incio_sesion__boton"
);

botonRegistro.addEventListener("click", mostrarRegistro);
botonInicioSesion.addEventListener("click", mostrarInicioSesion);

function mostrarInicioSesion() {
  formularioRegistro.classList.remove("mostrar");
  formularioRegistro.classList.add("ocultar");
  formularioInicioSesion.classList.add("mostrar");
}

function mostrarRegistro() {
  formularioInicioSesion.classList.remove("mostrar");
  formularioInicioSesion.classList.add("ocultar");
  formularioRegistro.classList.add("mostrar");
}
