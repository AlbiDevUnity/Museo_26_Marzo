<!DOCTYPE html>
<html lang="it">

<head>
    <title>Success</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/museum.png">

    <link href="css/homeStyle.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    include 'php/navbar.php';
    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">

        <div class="mb-3">
                <label for="Codice" class="form-label">
                <?php
                    session_start();
                    echo $_SESSION["labelMsg"];
                    
                    ?>
                </label>
                <input type="text" readonly class="form-control-plaintext" id="Codice" value=
                <?php
                    echo '"' . $_SESSION["message"] . '"';
                    
                    session_unset();
                    session_destroy();
                    ?>
                >
        </div>

            <div class="mb-3">
                <!--immagine-->

                <svg version="1.1" width="50%" height="50%" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                    <circle style="fill:#25AE88;" cx="25" cy="25" r="25" />
                    <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points="38,15 22,33 12,25 " />
                </svg>

            </div>
            <form action="index.php">
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark form-control">Return Home</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>