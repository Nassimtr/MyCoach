<?php
// Assurez-vous de démarrer la session en haut de chaque fichier PHP
session_start();
?>

<nav class="navbar">
    <ul>
        <li><a href="../php/index.php">Accueil</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="../php/seance.php">Séances</a></li>
            <li><a href="../php/logout.php">Se déconnecter</a></li>
        <?php else: ?>
            <li><a href="../php/login.php">Se connecter</a></li>
            <li><a href="../php/register.php">Pas encore inscrit ? Clique ici</a></li>
        <?php endif; ?>
    </ul>
</nav>