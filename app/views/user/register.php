<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../controllers/UserController.php';

$message = '';

// Logique d'inscription
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire | MySpotifie</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<style>

    /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Background */
body {
    font-family: Arial, sans-serif;
    background-color: #181818; /* Fond sombre comme Spotify */
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 20px;
}

/* Auth Container */
.auth-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.auth-box {
    background-color: #2c2c2c;
    border-radius: 10px;
    padding: 30px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Input Styles */
input[type="email"],
input[type="password"],
input[type="text"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #333;
    background-color: #3a3a3a;
    color: #fff;
    font-size: 14px;
}

input[type="email"]:focus,
input[type="password"]:focus,
input[type="text"]:focus {
    outline: none;
    border-color: #1db954;
}

/* Button Styles */
button {
    width: 100%;
    padding: 12px;
    background-color: #1db954; /* Spotify green */
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #1ed760;
}

/* Error & Success Messages */
.error-message,
.success-message {
    color: #e74c3c;
    text-align: center;
    margin-bottom: 10px;
}

.success-message {
    color: #2ecc71;
}

p {
    text-align: center;
    margin-top: 20px;
}

a {
    color: #1db954;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>
<div class="auth-container">
    <div class="auth-box">
        <h2>S'inscrire à MySpotifie</h2>
        <?php if ($message) : ?>
            <div class="success-message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" name="register">S'inscrire</button>
        </form>
        <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>
    </div>
</div>

</body>
</html>
