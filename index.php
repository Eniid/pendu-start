<?php 
session_start(); 

include('./configs/config.php');

    if(!isset($_SESSION['letters'])){
        $_SESSION['letters'] = $letters; 
    }; 

var_dump($_SESSION);
$used = $_POST['triedLetter'];
var_dump($used);

if(isset($_POST['triedLetter'])){ // valeur de l'attribut name
    $_SESSION['letters'][$used] = false; 
}

    include('./views/start.php'); 

