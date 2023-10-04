<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportBuddy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/navBar.css" type="text/css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php $events = [
        "cat-1" => (object) ["cat_img"=>"cat_footing.jpg",
    "title"=> "icon",
    "date" => "01/10/23",
    "time" => "20H00",
    "event_creator" => "Alan",
    "localisation" => "Parc Montcalm, Montpellier"],
        "cat-2" => (object) ["cat_img"=>"cat_footing.jpg",
        "title"=> "icon",
        "date" => "01/10/23",
        "time" => "20H30",
        "event_creator" => "Alan",
        "localisation" => "Zoo du Lunaret, Montpellier",
    ],
    "cat-3" => (object) ["cat_img"=>"cat_footing.jpg",
        "title"=> "icon",
        "date" => "01/10/23",
        "time" => "20H30",
        "event_creator" => "Alan",
        "localisation" => "Zoo du Lunaret, Montpellier",
    ],
    "cat-4" => (object) ["cat_img"=>"cat_footing.jpg",
            "title"=> "icon",
            "date" => "01/10/23",
            "time" => "20H30",
            "event_creator" => "Alan",
            "localisation" => "Zoo du Lunaret, Montpellier",
    ],
    
];?>

<main>
    <div class="container">      
            <div class="row d-flex mt-md-5 align-items-sm-stretch flex-wrap my-3">
                <?php foreach ($events as $e):?>
                        <div class="card p-0 m-3" style="width: 18rem;">
                            <img src="../images/cat_footing.jpg" class="card-img-top" alt="photo de footing">
                            <div class="card-body">
                            <span class="d-flex"><a href="#" class="card-link"><small>Proposé par <?=$e->event_creator?></small></a></span>
                            </div>
                            <ul class="list-group list-group-horizontal-sm">
                                <li class="list-group-item flex-fill"><span class="d-flex justify-content-center"><img src="../images/geo-alt-fill.svg" alt="icone localisation"></br></span><small class="text-body-secondary"><?=$e->localisation?></small></li>
                                <li class="list-group-item flex-fill"><span class="d-flex justify-content-center"><img src="../images/calendar3.svg" alt="icone calendrier"></span></br><small class="text-body-secondary"><?=$e->date?></small></li>
                                <li class="list-group-item flex-fill"><span class="d-flex justify-content-center"><img src="../images/stopwatch.svg" alt="icone calendrier"></span></br><small class="text-body-secondary"><?=$e->time?></small></li>
                            </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>