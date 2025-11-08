document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formReserva");
  const fechaIngreso = document.getElementById("fecha_ingreso");
  const fechaSalida = document.getElementById("fecha_salida");

  // Establecer fecha mínima (hoy)
  const today = new Date().toISOString().split("T")[0];
  fechaIngreso.setAttribute("min", today);
  fechaSalida.setAttribute("min", today);

  // Validación al enviar el formulario
  form.addEventListener("submit", (event) => {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    const ingreso = new Date(fechaIngreso.value);
    const salida = new Date(fechaSalida.value);

    if (salida <= ingreso) {
      event.preventDefault();
      event.stopPropagation();
      alert("La fecha de salida debe ser posterior a la fecha de ingreso.");
    }

    form.classList.add("was-validated");
  });
});
