<?php

include 'database.php';

$prenotazione = Get("SELECT * FROM prenotazioni WHERE id IN (SELECT idPrenotazione FROM codici WHERE codice=:codice)", "museo", 
bindParameters: array(
    new Obj("codice", $_POST["codice_p"])
));

if(count($prenotazione) > 0)
{
    //fare la parte di elimina

    header("Location: success.php");
    exit();
} 
else 
{
    header("Location: fail.php");
    exit();
}

?>