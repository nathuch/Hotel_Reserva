document.addEventListener("DOMContentLoaded", () => {
  const passwordInput = document.getElementById("password");

  const mayus = document.getElementById("mayus");
  const numero = document.getElementById("numero");
  const especial = document.getElementById("especial");
  const longitud = document.getElementById("longitud");

  const iconoOk = '<i class="bi bi-check-circle-fill text-success"></i>';
  const iconoMal = '<i class="bi bi-circle text-secondary"></i>';

  passwordInput.addEventListener("input", () => {
    const value = passwordInput.value;

    // Expresiones regulares para validar
    const tieneMayus = /[A-Z]/.test(value);
    const tieneNumero = /\d/.test(value);
    const tieneEspecial = /[!@#$%^&*(),.?":{}|<>]/.test(value);
    const tieneLongitud = value.length >= 8;

    // Cambiar estado visual de cada condición
    actualizarEstado(mayus, tieneMayus);
    actualizarEstado(numero, tieneNumero);
    actualizarEstado(especial, tieneEspecial);
    actualizarEstado(longitud, tieneLongitud);
  });

  // --- Confirmación de contraseña ---
  const confirmarInput = document.getElementById("confirmar");
  const errorMsg = document.getElementById("errorConfirmacion");

  confirmarInput.addEventListener("input", () => {
    if (confirmarInput.value !== passwordInput.value) {
      errorMsg.classList.remove("d-none"); // Mostrar mensaje
      confirmarInput.classList.add("is-invalid"); // borde rojo Bootstrap
    } else {
      errorMsg.classList.add("d-none"); // Ocultar mensaje
      confirmarInput.classList.remove("is-invalid");
    }
  });

  function actualizarEstado(elemento, cumple) {
    if (cumple) {
      elemento.innerHTML = iconoOk + " " + elemento.textContent.trim();
      elemento.classList.add("text-success");
      elemento.classList.remove("text-secondary");
    } else {
      elemento.innerHTML = iconoMal + " " + elemento.textContent.trim();
      elemento.classList.remove("text-success");
      elemento.classList.add("text-secondary");
    }
  }
});
