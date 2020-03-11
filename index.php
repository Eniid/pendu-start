<?php 
session_start(); // Cela permet de dire qu'on commence une session et que donc il va y avoir des truc à garder en mémoire d'une requête à l'autre.

include('./configs/config.php'); // Inclusion des config (settings), au début pour pouvoir les utiler plus tard 

// Pour éviter de refaire le isset à chaque fois //! Mais j'ai pas compris, y'a pas de requête en get si ? :/ 
// Du coup je le fait pas :/ 
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    
} elseif($_SERVER['REQUEST_METHOD'] === 'POST') {

} else {
    header('location: index.php');
    exit(); 
}

//! Teste mot | A modifier à terme 
$_SESSION['word'] = 'princesse'; //* 8 lettres
$_SESSION['state'];

// Conte du nombre de lettre dans le mot qu'on annalyse 
if(!isset($_SESSION['count'])){
    $_SESSION['count'] = strlen($_SESSION['word']);
}

// Etablisement de l'* à la place des lettres (en fonction du 'count')
if(!isset($_SESSION['remplacement'])){
    $_SESSION['remplacement'] = str_pad('', $_SESSION['count'], REMPLACEMENT); 
}

// Nombre d'essey restant 
if(!isset($_SESSION['trials'])){
    $_SESSION['trials'] = 0; 
    $_SESSION['remain_trials'] = MAX_TRIALS;
}; 

// Letters est un tableau avec toutes les lettres qui se trouve dans les settings, ici on l'ajoute au truc de session
    if(!isset($_SESSION['letters'])){
        $_SESSION['letters'] = $letters; 
    }; 


// Truc pour que ça ne big pas quand on a pas de lettre utilisée //? plus tart dans le code //
if(!isset($_SESSION['used_letters'])) {
    $_SESSION['used_letters'] = ''; 
} 

//$used = ($_POST['triedLetter']);

// Tout les bassare en lien avec la lettre utiliser //* ($_POST['triedLetter']) // 
if(isset($_POST['triedLetter'])){ // valeur de l'attribut name
    if(!array_key_exists($_POST['triedLetter'], $_SESSION['letters'])){ //! Comment la lettre peut ne pas être dans le tableau ? 
        header('location: index.php'); //? Redirige vers index ???
        exit(); 
    }
    $_SESSION['letters'][$_POST['triedLetter']] = false; 
    $_SESSION['used_letters'] .= $_POST['triedLetter'];

    for ($i = 0; $i < $_SESSION['count']; $i++){
        $letterFound = false; 
        if(substr($_SESSION['word'], $i, 1) === $_POST['triedLetter']){
            $_SESSION['remplacement'][$i] = $_POST['triedLetter'];
            $letterFound = true; 
        };
        
    }
    if(!$letterFound){
        $_SESSION['trials']++;  
        $_SESSION['remain_trials'] = MAX_TRIALS - $_SESSION['trials'];
    }
}; 

var_dump($_SESSION['trials']); 

    include('./views/start.php'); 

