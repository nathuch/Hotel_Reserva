<?php
class Controller
{
    public function verpagina($pagina)
    {

        include_once $pagina;
    }
    public function registeruser($data)
    {
        unset($_SESSION['errors']);
        unset($_SESSION['success']);
        unset($_SESSION['old']);

        $errores = $this->validatedata($data);
        var_dump($errores);
        if (count($errores) > 0) {
            $_SESSION['errors'] = $errores;
            $_SESSION['old'] = $data;
            echo "Errores en el formulario";

            header('Location:' . SITE_URL . 'index.php?action=registrarusuario');
            exit();
        }

        $user = new User();
        $existe = $user->validateuser($data);
        if ($existe !== null) {
            $_SESSION['errors'] = ['general' => 'El correo ya se encuentra registrado'];
            $_SESSION['old'] = $data;
            echo "El correo ya se encuentra registrado";
            header('Location:' . SITE_URL . 'index.php?action=registrarusuario');
            exit();
        }
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['password'] = $password;

        $resultado = $user->registeruser($data);
        if ($resultado > 0) {
            $_SESSION['success'] = 'Usuario registrado exitosamente';
            echo "Usuario registrado exitosamente";
            header('Location:' . SITE_URL . 'index.php?action=validarusuario');
            exit();
        } else {
            $_SESSION['errors'] = ['general' => 'Error al registrar el usuario'];
            $_SESSION['old'] = $data;
            echo "Error al registrar el usuario";
            header('Location:' . SITE_URL . 'index.php?action=registrarusuario');
            exit();
        }
    }
    public function validatedata($data)
    {
        $errores = [];
        if (empty(trim($data['numero_documento'] ?? ''))) {
            $errores['numero_documento'] = '* Número de documento obligatorio';
        }
        if (!isset($data['tipo_documento']) || $data['tipo_documento'] == '') {
            $errores['tipo_documento'] = '* Tipo de documento obligatorio';
        }

        if (empty(trim($data['nombre'] ?? ''))) {
            $errores['nombre'] = '* Nombre obligatorio';
        }
        if (empty(trim($data['apellido'] ?? ''))) {
            $errores['apellido'] = '* Apellido obligatorio';
        }
        if (empty(trim($data['telefono'] ?? ''))) {
            $errores['telefono'] = '* Teléfono obligatorio';
        }
        if (empty(trim($data['email'] ?? ''))) {
            $errores['email'] = 'Correo obligatorio';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'Correo no válido';
        }

        if (empty($data['password'] ?? '')) {
            $errores['password'] = 'Contraseña es obligatoria';
        } elseif (strlen($data['password']) < 6) {
            $errores['password'] = 'La contraseña debe tener al menos 6 caracteres';
        }
        return $errores;
    }

    public function loginuser($data)
    {
        $errores = [];
        if (empty(trim($data['email'] ?? ''))) {
            $errores['email'] = 'El usuario es obligatorio';
        }
        if (empty(trim($data['password'] ?? ''))) {
            $errores['password'] = 'La contraseña es obligatoria';
        }
        return $errores;
    }

    public function validatemail($data)
    {
        unset($_SESSION['errors']);
        unset($_SESSION['old']);

        $errores = $this->loginuser($data);
        if (count($errores) > 0) {
            $_SESSION['errors'] = $errores;
            header('Location: index.php?action=validarusuario');
            exit();
        }

        $user = new User();
        $exist = $user->validateuser($data);
        if ($exist !== null) {
            if (password_verify($data['password'], $exist['password'])) {
                $_SESSION['user'] = $exist;
                header('Location: index.php');
                exit();
            } else {
                $_SESSION['mesanje'] = "Contraseña incorrecta";
                header('Location: views/html/auth/login.php');
                exit();
            }
        }
    }
}
