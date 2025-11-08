document.getElementById("habitacion").addEventListener("change", (e) => {
  const habitacionId = e.target.value;

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?action=obtener_descripcion", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("habitacion_id=" + encodeURIComponent(habitacionId));
  xhr.onload = () => {
    if (xhr.status === 200) {
      document.getElementById("descripcionroom").innerHTML = xhr.responseText;
    } else {
      console.error("AJAX error", xhr.status, xhr.statusText, xhr.responseText);
      document.getElementById("descripcionroom").innerHTML = "";
    }
  };
  xhr.onerror = () => {
    console.error("Network error");
    document.getElementById("descripcionroom").innerHTML = "";
  };
});
