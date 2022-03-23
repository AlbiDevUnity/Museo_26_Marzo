<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link href="css/homeStyle.css" rel="stylesheet">

</head>

<body>

    <?php
    include 'php/navbar.php';
    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <form method="POST" action="php/inserisci.php">

                    <div class="mb-3">
                        <label for="InputNome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="InputNome" name="nome_P">
                    </div>

                    <div class="mb-3">
                        <label for="InputContatto" class="form-label">Contatto</label>
                        <input type="text" class="form-control" id="InputContatto" name="contatto_P">
                    </div>

                    <div class="mb-3">
                        <label for="InputNPersone" class="form-label">Numero di persone</label>
                        <input type="text" class="form-control" id="InputNPersone" name="nPersone_P">
                    </div>

                    <div class="mb-3">
                        <label for="InputOrario" class="form-label">Orario</label>
                        <input class="form-control" id="InputOrario" name="orario_P">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark form-control">Aggiungi</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="js/palle.js"></script>

</body>

</html>