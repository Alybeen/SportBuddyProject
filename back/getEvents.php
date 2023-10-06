<?php
// Informations de connexion à la base de données
include("connexion.php");

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparation de la requête SQL pour récupérer toutes les informations de la table "Event"
    $selectData = $pdo->prepare("SELECT e.*, c.cat_picture 
    FROM Events e, Catégorie c
    where e.id_cat = c.id_categorie order by e.id_event desc");

    $selectData->execute();


    // Initialisation du tableau $events
    $events = [];

    // Boucle pour récupérer les informations de chaque événement
    while ($row = $selectData->fetch(PDO::FETCH_ASSOC)) {
        $event = (object) [
            "cat_img" => $row['cat_picture'],
            "date" => date("d/m/y", strtotime($row['date_debut'])),
            "time" => date("H:i", strtotime($row['heure_debut'])),
            "event_creator" => $row['admin_event'],
            "localisation" => $row['localisation'] . ', ' . $row['ville']
        ];

        // Ajout de l'événement au tableau $events avec la clé "event-$row[id_event]"
        $events["event-$row[id_event]"] = $event;
    }
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
