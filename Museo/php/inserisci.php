
<?php

include 'database.php';

$bool = CheckMaxPeople($_POST["orario_P"], $_POST["nPersone_P"]);
$exc  = new PDOException();

if(strlen($_POST["nome_P"]) < 1)
{
    GoToPage("../fail.php", "Inserire un nome valido min 1 lettera", "Errore!");
}
elseif(strlen($_POST["contatto_P"]) < 1)
{
    GoToPage("../fail.php", "Inserire un contatto valido min 1 lettera", "Errore!");
}

if($bool)
{
    $bool = Post(
        "INSERT INTO prenotazioni(nome, contatto, nPersone, orario) VALUES (:nome, :contatto, :nPersone, :orario)",
        "museo",
        bindParameters: array(
            new Obj("nome", $_POST["nome_P"]),
            new Obj("contatto", $_POST["contatto_P"]),
            new Obj("nPersone", $_POST["nPersone_P"]),
            new Obj("orario", $_POST["orario_P"])
        ), exc:$exc
    );
}
else
{
    GoToPage("../fail.php", "Il museo è pieno a quell'ora!", "Errore!");
}

if ($bool) 
{
    //fai vedere pagina verde successo
    $array = Get("SELECT id FROM prenotazioni ORDER BY id DESC LIMIT 1", "museo");


    //generare codice per la modifica e l'eliminazione
    $codice = "";  
    do 
    {
        $codice = generateRandomString();

        $codiceBool = Post(
            "INSERT INTO codici(codice, idPrenotazione) VALUES (:codice, :idPrenotazione)",
            "museo",
            bindParameters: array(
                new Obj("codice", $codice),
                new Obj("idPrenotazione", $array[0]["id"])
            ),
        );
    } while (!$codiceBool);
   GoToPage("../success.php", $codice, "Codice per modificare o eliminare la prenotazione");
} 
else 
{
    console_log($exc->getMessage());

    if($exc->getCode() == "23000")
    {
        if(str_contains($exc->getMessage(), "nPersone"))
        {
            GoToPage("../fail.php", "Inserire un numero di persone valido! [1-5]", "Errore!");
        }
        elseif(str_contains($exc->getMessage(), "orario"))
        {
            GoToPage("../fail.php", "Orario già preso!", "Errore!");
        }
    }

}

?>
