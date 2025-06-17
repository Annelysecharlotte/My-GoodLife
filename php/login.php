<?php
// login.php – Connexion utilisateur
require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $motdepasse = $_POST["motdepasse"];
    $role = $_POST["role"];

    if ($role === "client") {
        $sql = "SELECT * FROM clients WHERE email = ?";
    } elseif ($role === "nutritionniste") {
        $sql = "SELECT * FROM nutritionnistes WHERE email = ?";
    } else {
        die("Rôle non reconnu");
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($motdepasse, $user["motdepasse"])) {
        // Connexion réussie : enregistrer les infos en session
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["role"] = $role;
        $_SESSION["nom"] = $user["nom"];

        // Redirection selon le rôle
        if ($role === "client") {
            header("Location: client-dashboard.html");
        } else {
            header("Location: nutritionist-dashboard.html");
        }
        exit();
    } else {
        echo "<p style='color:red;'>Email ou mot de passe incorrect</p>";
    }
}
?>
