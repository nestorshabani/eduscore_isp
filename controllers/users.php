<?php
session_start(); // Démarre la session

// Inclure la connexion à la base de données
require_once '../config/database.php'; // Assurez-vous que le chemin est correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez si c'est une inscription ou une connexion
    if (isset($_POST['action']) && $_POST['action'] === 'register') {
        // Inscription
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        // Validation des mots de passe
        if ($password !== $confirm_password) {
            header("Location: ../views/auth/register.php?error=Les mots de passe ne correspondent pas.");
            exit;
        }

        // Vérification si l'adresse e-mail existe déjà
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: ../views/auth/register.php?error=Cet e-mail est déjà utilisé.");
            exit;
        }

        // Hash du mot de passe et insertion dans la base
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Par défaut, attribuer le rôle "étudiant"
        $role = 'étudiant';

        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = 'Inscription réussie !';
            header("Location: ../index.php"); // Redirection vers la page d'accueil
            exit;
        } else {
            header("Location: ../views/auth/register.php?error=Une erreur est survenue lors de l'inscription.");
            exit;
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'login') {
        // Connexion
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Vérifiez si l'utilisateur existe
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Vérifiez le mot de passe
            if (password_verify($password, $user['password'])) {
                // Authentification réussie, redirigez vers la page appropriée
                $_SESSION['user_id'] = $user['id']; // Stockez l'ID utilisateur dans la session
                $_SESSION['user_role'] = $user['role']; // Stockez le rôle utilisateur dans la session

                // Redirection selon le rôle
                if ($user['role'] === 'admin') {
                    header("Location: ../views/admin/dashboard.php"); // Redirigez vers le tableau de bord admin
                } else {
                    header("Location: ../views/etudiant/dashboard.php"); // Redirigez vers le tableau de bord étudiant
                }
                exit;
            } else {
                // Mot de passe incorrect
                header("Location: ../views/auth/login.php?error= Désolez vos identifiants sont incorrects.");
                exit;
            }
        } else {
            // Utilisateur non trouvé
            header("Location: ../views/auth/login.php?error=Identifiants incorrects.");
            exit;
        }
    }
}
