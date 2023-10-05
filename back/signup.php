<?php
include("connexion.php");

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Définir le mode d'erreur PDO à exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exemple d'insertion d'un nouvel utilisateur via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $ville = $_POST['ville'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        // Préparation de la requête SQL d'insertion
        $insertQuery = $pdo->prepare("INSERT INTO Users (nom, prenom, ville, email, mdp) VALUES (:nom, :prenom, :ville, :email, :mdp)");

        // Exécution de la requête
        $insertQuery->execute(array(':nom' => $nom, ':prenom' => $prenom, ':ville' => $ville, ':email' => $email, ':mdp' => $mdp));
        // echo 'Utilisateur inséré avec succès !';
        header("Location: ../../front/pages/index.php");
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
?>

    <img class="image" src="../images/logo.svg">
    <form method="POST" class="signin">
    <h1 class="titleform h3 mb-3 fw-normal">Inscrivez-vous !</h1>
    <div class="form-floating">
        <input type="text" class="form-control" id="prenom" name="prenom" required>
        <label for="prenom">Prénom</label>
    </div>

    <div class="form-floating">
        <input type="text" class="form-control" id="nom" name="nom" required>
        <label for="nom">Nom</label>
    </div>

    <div class="form-floating">
        <input type="text" class="form-control" id="ville" name="ville" required>
        <label for="ville">Ville</label>
    </div>

    <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" required>
        <label for="email">Email</label>
    </div>

    <div class="form-floating">
        <input type="password" class="form-control" id="mdp" name="mdp" required>
        <label for="mdp">Mot de passe</label>
    </div>

    <button class="button w-100 py-2" type="submit">Sign in</button>
    </form>