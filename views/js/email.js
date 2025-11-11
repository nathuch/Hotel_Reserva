document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener("click", function (e) {
    const bton = e.target.closest(".enviaremail");
    if (!bton) return;
    if (bton.tagName === "A") e.preventDefault();
    const reservaId = bton.dataset.id;

    Swal.fire({
      title: "Enviando Correo",
      text: "por favor espere...",
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      },
    });

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php?action=enviar_email_reserva", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("reserva_id=" + encodeURIComponent(reservaId));

    xhr.onload = function () {
      if (xhr.status === 200) {
        Swal.fire({
          title: "Correo Enviado",
          icon: "success",
          draggable: true,
        });
      } else {
        Swal.fire({
          title: "  Error al Enviar Correo",
          icon: "error",
          draggable: true,
        });
      }
    };
  });
});
