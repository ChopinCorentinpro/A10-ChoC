<?php

$host = "127.0.0.1"; 
$dbname = "a10-poo"; 
$login = "root";
$mdp = "root";

try  // try connection
{
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=UTF8', $login,$mdp);
}
// catch and display the error and stop process
catch(Exception $e)
{
    die("Erreur: ".$e->getMessage());
}