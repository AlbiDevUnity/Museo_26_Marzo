<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cancella</title>

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
            <div class="card-body p-5">
                <form method="POST" action="php/cancella.php">

                    <div class="mb-3">
                        <label for="InputCodice" class="form-label">Codice</label>
                        <input type="text" class="form-control" id="InputCodice" name="codice_p">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark form-control">Elimina</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>