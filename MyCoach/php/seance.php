<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/seance-styles.css">

    <title>Séances</title>
</head>
<body>
<?php include '../php/navbar.php'; ?> <!-- Inclusion de la navbar -->

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si une variable de session spécifique est définie
if (!isset($_SESSION['user_id'])) {
    // Si la variable n'est pas définie, rediriger vers la page de connexion
    header('Location: login.php');
    exit(); // Assurez-vous que le script s'arrête après la redirection
}
require 'config.php'; // Inclure le fichier de configuration pour la connexion à la base de données

$query = "
    SELECT 
        Seance.heure_debut, 
        Seance.heure_fin, 
        Jour.nom AS jour, 
        Salle.nom AS salle, 
        Salle.ville, 
        Salle.adresse, 
        Salle.cp, 
        Niveau.libelle AS niveau, 
        Sport.nom AS sport
    FROM Seance
    JOIN Jour ON Seance.jour_id = Jour.id
    JOIN Salle ON Seance.salle_id = Salle.id
    JOIN Niveau ON Seance.niveau_id = Niveau.id
    JOIN Sport ON Seance.sport_id = Sport.id
    ORDER BY Jour.nom, Seance.heure_debut;
";


$result = $pdo->query($query);
?>

<table border="1">
    <thead>
        <tr>
            <th>Jour</th>
            <th>Sport</th>
            <th>Niveau</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Salle</th>
            <th>Adresse</th>
            <th>CP</th>
            <th>Ville</th>
            
            
        </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?php echo htmlspecialchars($row['jour']); ?></td>
    <td><?php echo htmlspecialchars($row['sport']); ?></td>
    <td><?php echo htmlspecialchars($row['niveau']); ?></td>
    <td><?php echo htmlspecialchars($row['heure_debut']); ?></td>
    <td><?php echo htmlspecialchars($row['heure_fin']); ?></td>
    <td><?php echo htmlspecialchars($row['salle']); ?></td>
    <td><?php echo htmlspecialchars($row['adresse']); ?></td>
    <td><?php echo htmlspecialchars($row['cp']); ?></td>
    <td><?php echo htmlspecialchars($row['ville']); ?></td>

</tr>
<?php endwhile; ?>

    </tbody>
</table>

</body>
</html>
