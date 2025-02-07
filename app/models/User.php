<?php
require_once __DIR__ . '/../../core/Database.php';
class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;

    public function __construct($id = null, $username = null, $email = null, $password = null, $role = 'user') {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    // Inscription d'un nouvel utilisateur
    public function register($username, $email, $password) {
        $db = new Database();
        
        $pdo = $db->connect();
        // Vérifier si l'utilisateur existe déjà
        $stmt = $pdo->prepare('SELECT id FROM person WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return false; // Email déjà utilisé
        }

        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insérer un nouvel utilisateur
        $stmt = $pdo->prepare('INSERT INTO person (username, email, password, role) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$username, $email, $hashedPassword, 'user']);
    }

    // Connexion de l'utilisateur
    public function login($email, $password) {
        $db = new Database();
        
        $pdo = $db->connect();
        $stmt = $pdo->prepare('SELECT * FROM person WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            
            session_start();
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            return true;
        }
        return false; // Mauvais identifiants
    }

    // Récupérer les informations de l'utilisateur connecté
    public static function getAuthenticatedUser() {
        session_start();
        return $_SESSION['user'] ?? null;
    }

    // Déconnexion de l'utilisateur
    public static function logout() {
        session_start();
        session_unset();
        session_destroy();
    }
}
?>
