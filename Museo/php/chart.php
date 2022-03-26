<?php
//header("Content-Type: application/json; charset=UTF-8");

$obj = $_GET["orario"];

include 'database.php';

$timestamp = strtotime($obj);

$monday = date("Y-m-d", strtotime('monday this week', $timestamp));
$sunday = date("Y-m-d", strtotime('sunday this week', $timestamp));

$array = Get("SELECT SUM(nPersone), DAYNAME(orario) FROM prenotazioni WHERE orario BETWEEN :monday AND :sunday GROUP BY DAYNAME(orario) ORDER BY orario DESC","museo", bindParameters:array(
    new Obj("monday", $monday),
    new Obj("sunday", $sunday)
));

echo json_encode($array);

?>