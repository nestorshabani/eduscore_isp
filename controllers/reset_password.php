<?php
session_start();
require_once '../config/database.php'; // Inclure votre connexion à la base

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'reset_password') {
        $email = trim($_POST['email']);

        // Vérifiez si l'adresse e-mail existe dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Utilisateur trouvé, générons un token et envoyons un e-mail.
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $token = bin2hex(random_bytes(16)); // Générer un token unique
            $expires = date("Y-m-d H:i:s", strtotime('+1 hour')); // Expire dans 1 heure

            // Stockez le token et la date d'expiration dans la base
            $stmt = $pdo->prepare("UPDATE users SET password_reset_token = :token, password_reset_expires = :expires WHERE email = :email");
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':expires', $expires);
            $stmt->bindParam(':email', $email);
            if ($stmt->execute()) {
                // Envoyer l'e-mail avec le lien pour réinitialiser le mot de passe.
                mail($email, "Réinitialisation du mot de passe", "Cliquez sur ce lien pour réinitialiser votre mot de passe: http://votre_domaine.com/reset_password_form.php?token=$token");

                $_SESSION['success_message'] = "Un e-mail a été envoyé avec les instructions.";
                header("Location: ../views/auth/forgot-password.php?message=Un e-mail a été envoyé avec les instructions.");
                exit;
            }
        } else {
            header("Location: ../views/auth/forgot-password.php?error=Aucune adresse e-mail trouvée.");
            exit;
        }
    }
}
