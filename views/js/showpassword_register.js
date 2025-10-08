// Script para mostrar/ocultar la contraseña

document.addEventListener("DOMContentLoaded", function () {
  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("password");
  const iconEye = document.getElementById("icon-eye");
  if (togglePassword && passwordInput && iconEye) {
    togglePassword.addEventListener("click", function () {
      const type = passwordInput.type === "password" ? "text" : "password";
      passwordInput.type = type;
      iconEye.classList.toggle("bi-eye");
      iconEye.classList.toggle("bi-eye-slash");
    });
  }
});
