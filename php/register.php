<?php
// register.php – Enregistrement client ou nutritionniste
require_once 'config.php';

// Vérifie que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST["role"];

    // Données communes
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $motdepasse = password_hash($_POST["motdepasse"], PASSWORD_DEFAULT); // hachage sécurisé

    if ($role === "client") {
        $taille = $_POST["taille"] ?? null;
        $poids = $_POST["poids"] ?? null;
        $objectif = $_POST["objectif"] ?? null;
        $duree = $_POST["duree"] ?? null;
        $sexe = $_POST["sexe"] ?? null;
        $date_naissance = $_POST["date_naissance"] ?? null;

        $sql = "INSERT INTO clients (nom, prenom, email, motdepasse, taille, poids, objectif, duree, sexe, date_naissance)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $email, $motdepasse, $taille, $poids, $objectif, $duree, $sexe, $date_naissance]);

        header("Location: login.html?success=client");
        exit();

    } elseif ($role === "nutritionniste") {
        $sql = "INSERT INTO nutritionnistes (nom, prenom, email, motdepasse)
                VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $email, $motdepasse]);

        header("Location: login.html?success=nutritionniste");
        exit();
    }
}
?>
