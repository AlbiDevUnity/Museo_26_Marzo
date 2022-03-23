
<?php

include 'database.php';

$bool = Post(
    "INSERT INTO prenotazioni(nome, contatto, nPersone, orario) VALUES (:nome, :contatto, :nPersone, :orario)",
    "museo",
    bindParameters: array(
        new Obj("nome", $_POST["nome_P"]),
        new Obj("contatto", $_POST["contatto_P"]),
        new Obj("nPersone", $_POST["nPersone_P"]),
        new Obj("orario", $_POST["orario_P"])
    )
);

console_log($bool);

if ($bool) 
{
    //fai vedere pagina verde successo
    $array = Get("SELECT id FROM prenotazioni ORDER BY id LIMIT 1", "museo");

    //generare codice per la modifica e l'eliminazione

    do 
    {
        $codiceBool = Post(
            "INSERT INTO codici(codice, idPrenotazione) VALUES (:codice, :idPrenotazione)",
            "museo",
            bindParameters: array(
                new Obj("codice", generateRandomString()),
                new Obj("idPrenotazione", $array[0]["id"])
            )
        );
    } while (!$codiceBool);

    

    header("Location: success.php");
    exit();
} 
else 
{
    header("Location: fail.php");
    exit();
}

?>
