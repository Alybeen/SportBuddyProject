<?php
// Informations de connexion à la base de données
$host = '192.168.81.239'; // Adresse du serveur MySQL
$dbname = 'devworkshop'; // Nom de la base de données
$username = 'devworkshop'; // Nom d'utilisateur MySQL
$password = '2R0tOz253Zat'; // Mot de passe MySQL

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparation de la requête SQL pour récupérer toutes les informations de la table "Event"
    $selectData = $pdo->prepare("SELECT e.*, c.cat_picture 
    FROM Events e, Catégorie c");

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

    // Affichage du tableau $events
    echo "<pre>";
    var_export($events);
    echo "</pre>";
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
