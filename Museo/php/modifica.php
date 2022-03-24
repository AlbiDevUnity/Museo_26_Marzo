<?php

include 'database.php';

    console_log($_POST);

    session_start();

    $bool = Post("UPDATE prenotazioni SET nome = :nome, contatto = :contatto, nPersone = :nPersone, orario = :orario WHERE id = :id", "museo", bindParameters:array(
        new Obj("id", $_SESSION["m_prenotazione"]["id"]),
        new Obj("nome", $_POST["nome_P"]),
        new Obj("contatto", $_POST["contatto_P"]),
        new Obj("nPersone", $_POST["nPersone_P"]),
        new Obj("orario", $_POST["orario_P"])
    ));

    session_unset();
    session_destroy();

    if($bool)
    {
        GoToPage("../success.php", "Modificato con successo", "");
    } 
    else
    {
        GoToPage("../fail.php", "Non è stato modificato", "Errore!");
    }
?>