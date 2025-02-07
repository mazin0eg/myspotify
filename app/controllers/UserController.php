<?php

class UserController {

    // Display the registration page
    public function register() {
        require_once 'views/user/register.php';
    }

    // Handle registration logic
    public function handleRegister() {
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $user = new User();
            if ($user->register($username, $email, $password)) {
                $message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
            } else {
                $message = "Erreur : cet email est déjà utilisé.";
            }
        }
    }

    // Display the login page
    public function login() {
        require_once 'views/user/login.php';
          
        
    }

    // Handle login logic
    public function handleLogin() {

        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $user = new User();
            if ($user->login($email, $password)) {
                header("Location: dashboard.php"); // Rediriger vers le tableau de bord
                exit();
            } else {
                $message = "Email ou mot de passe incorrect.";
            }
        }
    }

    // Logout logic
    public function logout() {
        session_start();
        session_destroy();
        header('Location: /');
        exit();
    }
}
