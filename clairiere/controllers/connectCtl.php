<?php

require_once 'models/users.php';

//variable booleenne pour verifier la validation de la connexion
$connectingUser = new user();
//Déclaration de regex
//Déclaration regex mail
$regexMail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
//Déclaration regex password
$regexPassword = '/^[0-9a-zA-Z]{8,12}+$/';

$formError = [];

if (isset($_POST['mail'])) {
    //déclarion de la variable password avec le htmlspecialchar 
    $mail = htmlspecialchars($_POST['mail']);
    //test de la regex si elle est invalide
    if (!preg_match($regexMail, $mail)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['mail'] = 'Mail incorrect';
    }
    // verifie si le champs de nom et vide
    if (empty($_POST['mail'])) {
        //stocker dans le tableau le rapport d'érreur
        $formError['mail'] = 'Champ obligatoire';
    }
}
if (isset($_POST['password'])) {
    //déclarion de la variable password avec le htmlspecialchar 
    $password = htmlspecialchars($_POST['password']);
    //test de la regex si elle est invalide
    if (!preg_match($regexPassword, $password)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['password'] = 'Mot de passe incorrect, votre mot de passe doit comporter 8 à 10 caractères (minuscules, MAJUSCULES, chiffres)';
    }
    // verifie si le champs de nom et vide
    if (empty($_POST['password'])) {
        //stocker dans le tableau le rapport d'érreur
        $formError['password'] = 'Champ obligatoire';
    }
}
if (count($formError) == 0 && isset($_POST['submitConnect'])) {
    $connectingUser->mail = $mail;
    $existingMail = $connectingUser->existMailConnexion();
    if ($existingMail && $existingMail->password === $password) {
        $_SESSION['user'] = $existingMail;
       //            header('location:index.php?page=accueil');
    }
}


 if (isset($_POST['submitDeconnect'])) {
     session_unset();
     session_destroy();
     session_start();
     $_SESSION['deconnectOK']= '<p> Vous êtes bien déconnecté <p>' ;
     header('location:index.php?page=validate');
     exit();
 }

