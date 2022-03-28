<?php

include 'database.php';

    $bool = CheckMaxPeople($_POST["orario_P"], $_POST["nPersone_P"]);
    $exc = new PDOException();

    if(strlen($_POST["nome_P"]) < 1)
    {
        GoToPage("../fail.php", "Inserire un nome valido min 1 lettera", "Errore!");
    }
    elseif(strlen($_POST["contatto_P"]) < 1)
    {
        GoToPage("../fail.php", "Inserire un contatto valido min 1 lettera", "Errore!");
    }

    session_start();

    if($bool)
    {
        $bool = Post("UPDATE prenotazioni SET nome = :nome, contatto = :contatto, nPersone = :nPersone, orario = :orario WHERE id = :id", "museo", bindParameters:array(
            new Obj("id", $_SESSION["m_prenotazione"]["id"]),
            new Obj("nome", $_POST["nome_P"]),
            new Obj("contatto", $_POST["contatto_P"]),
            new Obj("nPersone", $_POST["nPersone_P"]),
            new Obj("orario", $_POST["orario_P"])
        ));
    }
    else
    {
        GoToPage("../fail.php", "Il museo è pieno a quell'ora!", "Errore!");
    }

    session_unset();
    session_destroy();

    if($bool)
    {
        GoToPage("../success.php", "Modificato con successo", "");
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