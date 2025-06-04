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
$parking_requested = false;
if (isset($_GET["parking"]) && $_GET["parking"] == "on") {
    echo "parcheggi richiesti";
    $parking_requested = true;
}
$vote_minimum = 0;
if (isset($_GET["vote"]) && is_numeric($_GET["vote"]) && $_GET["vote"] > 0 && $_GET["vote"] <= 5) {
    $vote_minimum = (int) $_GET["vote"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container pt-3">
        <h1> Hotels</h1>
        <hr>
        <h4>Filtri</h4>
        <form action="" method="get" class="form-check">
            <div class="form-control">

                <input type="checkbox" name="parking" id="parking" />
                <label for="parking"> Parcheggio </label>
            </div>
            <div class="form-control">
                <input class="form-input" type="number" name="vote" id="vote" min="1" max="5" />
                <label class="form-label" for="vote"> Voto </label>
            </div>

            <button>Filtra</button>
        </form>
        <hr>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) { ?>
                    <?php if ($parking_requested) {
                        if (!$hotel["parking"]) {
                            continue;
                        }
                    }
                    if ($hotel["vote"] < $vote_minimum) {
                        continue;
                    }

                    ?>

                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Si' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>

</html>