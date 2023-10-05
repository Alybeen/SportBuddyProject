<?php
include("connexion.php");

session_start();

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $date_debut = $_POST['date_debut'];
        $heure_debut = $_POST['heure_debut'];
        $duree = $_POST['duree'];
        $personne_max = $_POST['personne_max'];
        $ville = $_POST['ville'];
        $rue = $_POST['rue'];
        $localisation = $_POST['localisation'];
        $admin_event = $_POST['admin_event'];
        $id_user = $_POST['id_user'];

        // Préparation de la requête SQL pour l'insertion
        $insertQuery = $pdo->prepare("INSERT INTO Events (date_debut, heure_debut, duree, personne_max, ville, rue, localisation, admin_event, id_user) VALUES (:date_debut, :heure_debut, :duree, :personne_max, :ville, :rue, :localisation, :admin_event, :id_user)");

        // Exécution de la requête avec les valeurs des champs du formulaire
        $insertQuery->execute(array(
            ':date_debut' => $date_debut,
            ':heure_debut' => $heure_debut,
            ':duree' => $duree,
            ':personne_max' => $personne_max,
            ':ville' => $ville,
            ':rue' => $rue,
            ':localisation' => $localisation,
            ':admin_event' => $admin_event,
            ':id_user' => $id_user
        ));

        echo 'Événement créé avec succès.';
    }
} catch (PDOException $e) {
    echo 'Erreur lors de la création de l\'événement : ' . $e->getMessage();
}
?>

<h1>Créer un nouvel événement</h1>
<form method="POST">
    <!-- Les champs du formulaire -->
    <div class="form-group">
        <label for="date_debut">Date de début :</label>
        <input type="date" id="date_debut" name="date_debut" required>
    </div>

    <div class="form-group">
        <label for="heure_debut">Heure de début :</label>
        <input type="time" id="heure_debut" name="heure_debut" required>
    </div>

    <div class="form-group">
        <label for="duree">Durée (en minutes) :</label>
        <input type="number" id="duree" name="duree" required>
    </div>

    <div class="form-group">
        <label for="personne_max">Nombre de personnes maximum :</label>
        <input type="number" id="personne_max" name="personne_max" required>
    </div>

    <div class="form-group">
        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville" required>
    </div>

    <div class="form-group">
        <label for="rue">Rue :</label>
        <input type="text" id="rue" name="rue" required>
    </div>

    <div class="form-group">
        <label for="localisation">Localisation :</label>
        <input type="text" id="localisation" name="localisation" required>
    </div>

    <?php
    $user = $pdo->prepare("SELECT nom FROM Users");
    $user->execute();

    $id = $pdo->prepare("SELECT id_user FROM Users");
    $id->execute();
    ?>

<input type="hidden" name="admin_event" value="<?php echo $user->fetchColumn(); ?>">
<input type="hidden" name="id_user" value="<?php echo $id->fetchColumn(); ?>">


    <div class="form_group">
        <button type="submit">Créer l'événement</button>
    </div>
</form>