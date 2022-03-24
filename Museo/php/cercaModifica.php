<?php

include 'database.php';

    $array = Get("SELECT * FROM prenotazioni WHERE id IN(SELECT idPrenotazione FROM codici WHERE codice=:codice)", "museo", bindParameters:array(
        new Obj("codice", $_POST["codice_p"])
    ));

    if(count($array) <= 0)
    {
        GoToPage("../fail.php", "codice sbagliato", "Errore!");
    }

    session_start();

    $_SESSION["m_prenotazione"] = $array[0];

    header("Location: ../modificaPrenotazione.php");
    exit();

?>