<?php
// save-meal.php – Enregistrement d'un repas
require_once 'config.php';
session_start();

// Vérifie que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $quantite = $_POST["quantite"];
    $type = $_POST["type"];

    $sql = "INSERT INTO repas (nom, description, quantite, type) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $description, $quantite, $type]);

    header("Location: ../add-meal.html?success=1");
    exit();
}
?>
