<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.sportBuddy.com</title>
    <meta name="description" content="SportBuddy est une application dont l'objectif est de permettre aux sportifs ou aux personnes qui veulent se motiver à faire du sport à trouver facilement et rapidement des partenaires.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/navBar.css" type="text/css">
    <link rel="stylesheet" href="../stylesheets/index.css" type="text/css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php include("../../back/getEvents.php")?>

<main>
    <div class="container">
    <div class="container-fluid mt-4">
            <!-- todo: get categories list from database -->
            <ul class="d-flex">
                <li class="flex-fill"><a class="categories-items index-list" href="#"><img src="../images/icone_course.svg" alt="illustration course"></a></li>
                <li class="flex-fill"><a class="categories-items index-list" href="#"><img src="../images/icone_callisthenie.svg" alt="illustration callisthénie"></a></li>
                <li class="flex-fill"><a class="categories-items index-list" href="#"><img src="../images/icone_houlahoop.svg" alt="illustration musculation"></a></li>
                <li class="flex-fill"><a class="categories-items index-list" href="#"><img src="../images/icone_musculation.svg" alt="illustration musculation"></a></li>
                <li class="flex-fill"><a class="categories-items index-list" href="#"><img src="../images/icone_natation.svg" alt="illustration musculation"></a></li>
                <li class="flex-fill"><a class="categories-items index-list" href="#"><img src="../images/icone_streetworkout.svg" alt="illustration street"></a></li>
                <li class="flex-fill"><a class="categories-items index-list" href="#"><img src="../images/icone_yoga.svg" alt="illustration yoga"></a></li>
                <li class="flex-fill"><a class="categories-items index-list" href="#"><img src="../images/icone_velo.svg" alt="illustration musculation"></a></li>
            </ul>
    </div>     
            <div class="row d-flex mt-md-5 align-items-sm-stretch flex-wrap my-3">
                <?php foreach ($events as $e):?>
                        <div class="card p-0 m-3" style="width: 18rem;">
                            <img src="../images/<?= $e->cat_img?>" class="card-img-top" alt="photo de footing">
                            <div class="card-body">
                            <span class="d-flex"><a href="#" class="card-link" style="color:#FD5700";>
                            <small>Proposé par <?=$e->event_creator?></small></a></span>
                            </div>
                            <ul class="list-group list-group-horizontal-sm">
                                <li class="list-group-item flex-fill">
                                    <span class="d-flex justify-content-center">
                                        <img src="../images/geo-alt-fill.svg" alt="icone localisation"></br></span>
                                        <small class="text-body-secondary"><?=$e->localisation?></small></li>
                                <li class="list-group-item flex-fill"><span class="d-flex justify-content-center"><img src="../images/calendar3.svg" alt="icone calendrier"></span></br><small class="text-body-secondary"><?=$e->date?></small></li>
                                <li class="list-group-item flex-fill"><span class="d-flex justify-content-center"><img src="../images/stopwatch.svg" alt="icone calendrier"></span></br><small class="text-body-secondary"><?=$e->time?></small></li>
                            </ul>
                                <div class="d-flex justify-content-between align-items-center">
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>