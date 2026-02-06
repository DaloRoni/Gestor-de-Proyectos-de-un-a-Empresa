<?php
require_once __DIR__ . '/../models/UserModel.php';

class AuthController
{
    protected $userModel;
    public function __construct(){
        $this->userModel = new UserModel();
    }

    public function showLogin()
    {
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/auth/login.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function showRegister()
    {
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/auth/register.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function register()
    {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pass = $_POST['password'] ?? '';
        if (!$name || !$email || !$pass) {
            $_SESSION['error'] = 'Todos los campos son obligatorios.';
            header('Location: index.php?route=register'); exit;
        }
        if ($this->userModel->findByEmail($email)) {
            $_SESSION['error'] = 'El email ya está registrado.';
            header('Location: index.php?route=register'); exit;
        }
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $this->userModel->create($name, $email, $hash);
        $_SESSION['success'] = 'Registro correcto, ahora inicie sesión.';
        header('Location: index.php?route=login'); exit;
    }

    public function login()
    {
        $email = trim($_POST['email'] ?? '');
        $pass = $_POST['password'] ?? '';
        if (!$email || !$pass) {
            $_SESSION['error'] = 'Email y contraseña son obligatorios.';
            header('Location: index.php?route=login'); exit;
        }
        $user = $this->userModel->findByEmail($email);
        if (!$user || !password_verify($pass, $user['password'])) {
            $_SESSION['error'] = 'Credenciales inválidas.';
            header('Location: index.php?route=login'); exit;
        }
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: index.php?route=dashboard'); exit;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php'); exit;
    }
}
