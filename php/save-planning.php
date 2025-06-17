<?php
// save-planning.php – Affecter un repas à un client pour une date donnée
require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $client_id = $_POST["client_id"];
    $repas_id = $_POST["repas_id"];
    $date = $_POST["date"];
    $type = $_POST["type"];

    $sql = "INSERT INTO planning (client_id, repas_id, date, type) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$client_id, $repas_id, $date, $type]);

    header("Location: ../planning.html?success=1");
    exit();
}
?>
