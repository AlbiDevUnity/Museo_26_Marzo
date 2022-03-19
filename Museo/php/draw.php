<?php

include 'php/database.php';

function DrawTable($query, $host, $dbname, $username = "root", $password = "")
{
  $array = Get($query, $host, $dbname, $username, $password);

  echo 
  '<table class="table table-hover">
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

  echo ' </tbody></table>';
}


