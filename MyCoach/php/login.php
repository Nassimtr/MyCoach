
<?php
session_start(); // Démarrer la session


require 'config.php'; // Fichier de configuration de la BDD

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp']; // Le mot de passe sera haché dans une application réelle

    // Préparer la requête SQL pour éviter les injections SQL
    $query = $pdo->prepare("SELECT id, mdp FROM compte WHERE pseudo = ?");
    $query->execute([$pseudo]);
    $user = $query->fetch();

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($mdp, $user['mdp'])) {
        // Si les identifiants sont corrects, enregistrer l'info dans la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['pseudo'] = $pseudo; // Enregistre également le pseudo si nécessaire
        $_SESSION['verif'] = "true";
        // Rediriger vers la page sécurisée après connexion réussie
        header("Location: index.php");
        exit();
    } else {
        // Si les identifiants sont incorrects, renvoyer à la page de connexion avec une erreur
        $_SESSION['error'] = 'Identifiants ou MDP incorrects.';
        header("Location: login.php"); // Assurez-vous que ce fichier a une logique pour afficher les erreurs de session.
        exit();
    }
}

// Toujours bon de vérifier si la session error est définie et l'afficher
if(isset($_SESSION['error'])) {
    echo "<p>".$_SESSION['error']."</p>";
    unset($_SESSION['error']); // Effacer l'erreur après l'affichage
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/login-register-styles.css">
    <script src="script.js"></script>
</head>
<body>

<form action="login.php" method="post">
    <label for="pseudo">Pseudo:</label>
    <input type="text" id="pseudo" name="pseudo" required>
    
    <label for="mdp">Mot de passe:</label>
    <input type="password" id="mdp" name="mdp" required>
    
    <button type="submit">Connexion</button>
    <p>Pas encore inscrit ? <a href="register.php">Créez un compte</a>.</p>
</form>

</body>
</html>
