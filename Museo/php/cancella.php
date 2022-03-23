<?php

include 'database.php';

$prenotazione = Get("SELECT * FROM prenotazioni WHERE id IN (SELECT idPrenotazione FROM codici WHERE codice=:codice)", "museo", 
bindParameters: array(
    new Obj("codice", $_POST["codice_p"])
));

if(count($prenotazione) > 0)
{
    //fare la parte di elimina

    $bool = Post("DELETE FROM prenotazioni WHERE id=:id", "museo", bindParameters: array(
        new Obj("id", $prenotazione[0]["id"])
    ));

    console_log($bool);

    GoToPage("../success.php", "Eliminato con successo", "");
} 
else 
{
    GoToPage("../fail.php", "Codice sbagliato", "Errore!");
}

?>