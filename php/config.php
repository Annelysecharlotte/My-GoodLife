<?php
// config.php – Connexion à la base de données MySQL

$host = "localhost";       // Hôte du serveur MySQL (souvent localhost)
$dbname = "mygoodlife";    // Nom de ta base de données
$username = "root";        // Nom d'utilisateur MySQL (par défaut dans XAMPP)
$password = "";            // Mot de passe (souvent vide dans XAMPP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Affichage des erreurs SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
