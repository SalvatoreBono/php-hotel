<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="https://boolean.careers/favicon/favicon.ico" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="app">
        <div class="container pt-5">
            <form method="GET" class="g-3 d-flex align-items-center pb-5 justify-content-center">

                <div class="col-md-3 me-3">
                    <select name="parking" id="inputState" class="form-select" aria-placeholder="">
                        <option value="undefined" hidden selected> Vuoi il parcheggio nell'hotel...</option>
                        <option value="undefined">Indifferente</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-md-3 me-3">
                    <select name="vote" id="inputState" class="form-select" aria-placeholder="">
                        <option value="undefined" hidden selected> Quante stelle deve avere l'hotel...</option>
                        <option value="undefined">Indifferente</option>
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Cerca</button>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hotels as $hotel) { //entro in php ed apro il foreach
                        if (
                            /* "!$_GET" se non esiste nessun get stampa */
                            !$_GET
                            /* $_GET["parking"] == "undefined" && $_GET["vote"] == "undefined"  se non seleziono il parcheggio e non selezione le stelle */
                            || $_GET["parking"] == "undefined" && $_GET["vote"] == "undefined"

                            /* $_GET["parking"] == $hotel["parking"] && $_GET["vote"] == "undefined"  se selezioni il parcheggio e non selezione le stelle */
                            || $_GET["parking"] == $hotel["parking"] && $_GET["vote"] == "undefined"

                            /* $_GET["parking"] == $hotel["parking"] && $hotel["vote"] >=  $_GET["vote"]  se selezioni il parcheggio e selezioni le stelle */
                            || $_GET["parking"] == $hotel["parking"] && $hotel["vote"] >=  $_GET["vote"]

                            /*$_GET["parking"] == "undefined" && $hotel["vote"] >=  $_GET["vote"] se non selezioni il parcheggio e selezioni le stelle */
                            || $_GET["parking"] == "undefined" && $hotel["vote"] >=  $_GET["vote"]
                        ) {
                    ?> <!-- chiudo php -->
                            <tr>
                                <td><?php echo $hotel['name'] ?></td>
                                <td><?php echo $hotel['description'] ?></td>

                                <!-- in true metti "Si" e in false metti "No" -->
                                <td><?php echo $hotel['parking'] ? "Si" : "No" ?></td>

                                <td><?php echo $hotel['vote'] ?></td>
                                <td><?php echo $hotel['distance_to_center'] ?></td>
                            </tr>
                    <?php /* entro in php */
                        }
                    } /* chiudo il foreach */
                    ?> <!-- esco da php -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>