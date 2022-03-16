<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="css/homeStyle.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    function console_log($output)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        $js_code = '<script>' . $js_code . '</script>';
        echo $js_code;
    }

    function Get($query, $localhost, $dbname, $username = "root", $password = "")
    {
        try 
        {
            $connection = new PDO('mysql:host=' . $localhost . ';dbname=' . $dbname, $username, $password);
            $result = $connection->prepare($query);
            $result->execute();

            $array = array();
            foreach ($result as $row) 
            {
                array_push($array, $row);
            }

            $result = null;
            $connection = null;

            return $array;
        } 
        catch (PDOException $e) 
        {
            console_log(($e->getMessage()));
            die();
        }
    }

    function Post()
    {
    }

    function DrawTable()
    {
        $array = Get('SELECT * FROM prenotazioni', "localhost", "museo");

        echo '<table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Contatto</th>
            <th scope="col">Numero Persone</th>
            <th scope="col">Orario</th>
          </tr>
        </thead>
        <tbody>';

        foreach ($array as $value) 
        {
            echo '<tr>';
            echo '<th scope="row">' . $value["id"] . '</th>';
            echo '<td scope="row">' . $value["nome"] . '</td>';
            echo '<td scope="row">' . $value["contatto"] . '</td>';
            echo '<td scope="row">' . $value["nPersone"] . '</td>';
            echo '<td scope="row">' . $value["orario"] . '</td>';
            echo '</tr>';
        }

        echo ' </tbody>
        </table>';
    }
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Museo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="prenota.php">Prenota</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <?php
                DrawTable();
                ?>
            </div>
        </div>
    </div>

</body>

</html>