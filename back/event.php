<?php
include("connexion.php");

session_start();

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $cat = $_POST['categorie'];
        $date_debut = $_POST['date_debut'];
        $heure_debut = $_POST['heure_debut'];
        $duree = $_POST['duree'];
        $personne_max = $_POST['personne_max'];
        $ville = $_POST['ville'];
        $localisation = $_POST['localisation'];
        $admin_event = $_POST['admin_event'];
        $id_user = $_POST['id_user'];

        // Préparation de la requête SQL pour l'insertion
        $insertQuery = $pdo->prepare("INSERT INTO Events (date_debut, heure_debut, duree, personne_max, ville, localisation, admin_event, id_user, id_cat) VALUES (:date_debut, :heure_debut, :duree, :personne_max, :ville, :localisation, :admin_event, :id_user, :id_cat)");

        // Exécution de la requête avec les valeurs des champs du formulaire
        $insertQuery->execute(array(
            ':id_cat' => $cat,
            ':date_debut' => $date_debut,
            ':heure_debut' => $heure_debut,
            ':duree' => $duree,
            ':personne_max' => $personne_max,
            ':ville' => $ville,
            ':localisation' => $localisation,
            ':admin_event' => $admin_event,
            ':id_user' => $id_user
        ));

        // echo 'Événement créé avec succès.';
        header("Location: ../../front/pages/index.php");
    }
} catch (PDOException $e) {
    echo 'Erreur lors de la création de l\'événement : ' . $e->getMessage();
}
?>

<p class="h3">Créer un nouvel évènement !<p>
<img class="image" src="../images/logo.svg">
<form method="POST" class="signin">
    <!-- Les champs du formulaire -->
    <div class="form-group">
        <select class="form-select" name="categorie" id="categorie" required>
            <option selected>Discipline sportive :</option>
            <option value="7">Yoga</option>
            <option value="4">Course</option>
            <option value="13">Surf</option>
            <option value="8">Musculation</option>
        </select>
    </div>


    <div class="form-group">
        <label for="date_debut">Date de début :</label>
        <input type="date" class="form-control" id="date_debut" name="date_debut" required>
    </div>

    <div class="form-group">
        <label for="heure_debut">Heure de début :</label>
        <input type="time" class="form-control" id="heure_debut" name="heure_debut" required>
    </div>

    <div class="form-group">
        <label for="duree">Durée (en minutes) :</label>
        <input type="number" class="form-control" id="duree" name="duree" required>
    </div>

    <div class="form-group">
        <label for="personne_max">Nombre de personnes maximum :</label>
        <input type="number" class="form-control" id="personne_max" name="personne_max" min="2" step="1" required>
    </div>

    <div class="form-group">
        <label for="ville">Ville :</label>
        <input type="text" class="form-control" id="ville" name="ville" required>
    </div>

    <div class="form-group">
        <label for="localisation">Lieu :</label>
        <input type="text" class="form-control" id="localisation" name="localisation" required>
    </div>

    <?php
    $user = $pdo->prepare("SELECT nom FROM Users");
    $user->execute();

    $id = $pdo->prepare("SELECT id_user FROM Users");
    $id->execute();
    ?>
    <div class="form-group">
        <input type="hidden" name="admin_event" value="<?php echo $user->fetchColumn(); ?>">
        <input type="hidden" name="id_user" value="<?php echo $id->fetchColumn(); ?>">
    </div>


    <button class="button w-100 py-2 mt-5" type="submit">Créer l'événement</button>
</form>

