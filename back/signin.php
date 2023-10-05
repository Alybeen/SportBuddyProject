<?php
include("connexion.php");

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Définir le mode d'erreur PDO à exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exemple de vérification de l'authentification via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        // Préparation de la requête SQL pour vérifier l'authentification
        $selectQuery = $pdo->prepare("SELECT id_user FROM Users WHERE email = :email AND mdp = :mdp");

        // Exécution de la requête
        $selectQuery->execute(array(':email' => $email, ':mdp' => $mdp));

        // Vérifier si l'utilisateur existe et le rediriger ou afficher un message
        if ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
            // Utilisateur authentifié, vous pouvez rediriger l'utilisateur vers une autre page
            // Après une authentification réussie

            // Démarrez la session
            session_start();

            // Mettez à jour la colonne isconnected pour l'utilisateur connecté
            $id_user = $row['id_user'];
            $updateQuery = $pdo->prepare("UPDATE Users SET isconnected = 1 WHERE id_user = :id_user");
            $updateQuery->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $updateQuery->execute();

            $_SESSION['user_connected'] = true;

            echo 'User connecté avec succès.';
        } else {
            echo 'Identifiants incorrects. Veuillez réessayer.';
        }
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
?>

<h1>Authentification</h1>
<form method="POST">
    <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" required>
        <label for="email">Email</label>
    </div>

    <div class="form-floating">
        <input type="password" class="form-control" id="mdp" name="mdp" required>
        <label for="mdp">Mot de passe</label>
    </div>

    <button class="button w-100 py-2" type="submit">Connexion</button>
</form>