<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>Coach Sportif</title>
</head>
<body>

<?php include '../php/navbar.php'; ?> <!-- Inclusion de la navbar -->

    <div class="container">
        <!-- Section Coach -->
        <div class="coach-section">
            <img src="../img/coach.png" alt="Photo du Coach" class="coach-photo">
            <h1>Jean Dupont</h1> <!-- Nom du coach -->
            <h2>Coach Expert</h2> <!-- Prénom du coach -->
            <p>Fort de plus de 10 ans d'expérience dans le domaine du sport, Jean Dupont est spécialisé en musculation, crossfit et boxe thaï. Il est passionné par le coaching et aime aider ses clients à atteindre leurs objectifs sportifs.</p>
        </div>

        <!-- Section Activités -->
        <div class="activities-section">
            <!-- Musculation -->
            <div class="activity">
                <img src="../img/muscu.png" alt="Image de la musculation">
                <h3>Musculation</h3>
                <p>La musculation est un ensemble d'exercices physiques visant le développement des muscles squelettiques, afin d'acquérir plus de force, d'endurance, de puissance ou de volume musculaire. Elle est utilisée autant par les athlètes professionnels que par les amateurs pour améliorer leurs performances.</p>
            </div>
            <!-- Crossfit -->
            <div class="activity">
                <img src="../img/crossfit.png" alt="Image du crossfit">
                <h3>Crossfit</h3>
                <p>Le Crossfit combine des mouvements de gymnastique, d'haltérophilie et d'aérobic en un seul entraînement. Il est conçu pour améliorer la force, l'agilité, la coordination et l'endurance. Chaque session est différente, garantissant ainsi des séances variées et stimulantes.</p>
            </div>
            <!-- Boxe Thaï -->
            <div class="activity">
                <img src="../img/thai.png" alt="Image de la boxe thaï">
                <h3>Boxe Thaï</h3>
                <p>La boxe thaï, également connue sous le nom de Muay Thai, est un art martial originaire de Thaïlande. Elle est caractérisée par l'utilisation des poings, des coudes, des genoux et des tibias. C'est un sport intense qui améliore la force, la souplesse et la discipline mentale.</p>
            </div>
        </div>
    </div>

</body>
</html>
