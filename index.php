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

    $hotelKeys = array_keys($hotels[0]);
    $parking = $_GET['parking'];
    $vote = $_GET['vote'];

    if($parking) {

        $hotels = array_filter($hotels, function ($hotels){
            return $hotels['parking'];
        });

    };

    if ($vote) {
        $hotels = array_filter($hotels, function($hotel)use($vote){
          return $hotel['vote'] == $vote;
        });
    };

?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container-xxl py-5">
        <div class="p-5 w-25 m-auto"><img class="img-fluid" src="./img/1280px-Booking.com_logo.svg.png" alt=""></div>
        <form class="d-flex gap-5 align-items-center justify-content-around mb-5">
            <div class="w-75">
                <select class="form-select" aria-label="Hotel Vote" name="vote">
                    <option value="">Qualsiasi Valutazione</option>
                    <option value="1">1 Stella</option>
                    <option value="2">2 Stelle</option>
                    <option value="3">3 Stelle</option>
                    <option value="4">4 Stelle</option>
                    <option value="5">5 Stelle</option>
                </select>
            </div>
            <div class="text-nowrap">
                <label for="parking" class="form-check-label">Mostra con parcheggio</label>
                <input type="checkbox" class="form-check-input" id="parking" name="parking">
            </div>
            <input type="submit" class="rounded-4 px-2 py-1 bg-primary text-white border-white">
        </form>
        <div class="table-responsive card">
            <table class="table table-bordered table-striped m-0">
                <thead>
                    <tr class="table-primary">
                        <?php
                            foreach ($hotelKeys as $key){
                                echo "<th>$key</th>";    
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($hotels as $currentHotel){
                            echo "<tr>";
                                foreach ($currentHotel as $currentInfo){
                                    echo "<td> $currentInfo </td>";
                                }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>