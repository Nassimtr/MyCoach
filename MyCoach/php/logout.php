<?php
// logout.php
session_start();
session_destroy(); // Détruit toutes les données de session
header("Location: index.php"); // Redirige vers la page de connexion
exit;
?>
