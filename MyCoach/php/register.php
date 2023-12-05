<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'config.php';

    // Récupérer les données du formulaire
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : ''; // Assigner à $pseudo la valeur de $_POST['pseudo'] si elle existe, sinon assigner une chaîne vide
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '';  

    // Vérifier si le pseudo existe déjà
    $checkQuery = $pdo->prepare("SELECT * FROM compte WHERE pseudo = :pseudo");
    $checkQuery->bindParam(':pseudo', $pseudo);
    $checkQuery->execute();

    if ($checkQuery->rowCount() > 0) {
        // Pseudo déjà pris
        echo "Ce pseudo est déjà utilisé. Veuillez en choisir un autre.";
    } else {
        // Hacher le mot de passe avant de l'insérer dans la base de données
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

        // Préparer la requête SQL pour éviter les injections SQL
        $query = $pdo->prepare("INSERT INTO compte (pseudo, mdp) VALUES (:pseudo, :mdp)");
        $query->bindParam(':pseudo', $pseudo);
        $query->bindParam(':mdp', $mdp_hash);

        // Exécuter la requête
        if ($query->execute()) {
            echo "Compte créé avec succès.";
            // Ici, tu pourrais rediriger l'utilisateur vers la page de connexion ou autre
        } else {
            echo "Erreur lors de la création du compte.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/login-register-styles.css">
</head>
<body>

<form action="register.php" method="post">
    <label for="pseudo">Pseudo:</label>
    <input type="text" id="pseudo" name="pseudo" required>
    
    <label for="mdp">Mot de passe:</label>
    <input type="password" id="mdp" name="mdp" required>
    
    <button type="submit">Créer un compte</button>
    <p>Déja inscrit <a href="login.php">Se connecter </a>.</p>
</form>

</body>
</html>
