<!DOCTYPE html>
<html lang="it">

<head>
    <title>Home</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/museum.png">

    <link href="css/homeStyle.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

    <?php

        include 'php/draw.php';
        include 'php/navbar.php';
    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <?php
                    DrawTable("SELECT * FROM prenotazioni", "museo");
                ?>

                <div class="mb-3">
                    <label for="InputOrario" class="form-label">Orario</label>
                    <input class="form-control" id="InputOrario">
                </div>

                <canvas id="myChart" height="50px" width="100%"></canvas>
            </div>
        </div>
    </div>

    <script src="js/flatpickr.js"></script>
    <script src="js/chart.js"></script>
</body>

</html>