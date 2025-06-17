<?php
// logout.php – Déconnexion utilisateur
session_start();
session_unset();  // Vide toutes les variables de session
session_destroy();  // Détruit la session

// Redirection vers l'accueil ou la page de connexion
header("Location: index.html");
exit();
?>
