<?php

require_once 'models/users.php';
require_once 'models/biography.php';
//require 'models/specialities.php';

$artist = new user();
$artist->idUserType = 2;

$bio = new biography();

$speciality = new speciality();
$listSpeciality = $speciality->listSpec();
//Déclaration des regex
//Déclaration regex nom
$regexName = '/^[A-zà-Ÿ -\']+$/';
//Déclaration regex nom
$regexPseudo = '/^[0-9a-zA-Zà-Ÿ \-\'*()]+$/';
//Déclaration regex password
$regexPassword = '/^[0-9a-zA-Z]{8,12}+$/';
//Déclaration regex mail
$regexMail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
//déclaration d'un tableau d'érreur
$formError = [];
$addOK = TRUE;


//Si LastName existe , la passer au test regex , sinon c'est vide donc rien
if (isset($_POST['lastName'])) {
    //déclarion de la variable pseudo avec le htmlspecialchar 
    $lastName = htmlspecialchars($_POST['lastName']);
    //test de la regex si elle est invalide
    if (!preg_match($regexName, $lastName)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['lastName'] = 'Saisie invalide';
    }
    // verifie si le champs de nom et vide
    if (empty($lastName)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['lastName'] = 'Champ obligatoire';
    }
}
if (isset($_POST['firstName'])) {
    //déclarion de la variable password avec le htmlspecialchar 
    $firstName = htmlspecialchars($_POST['firstName']);
    //test de la regex si elle est invalide
    if (!preg_match($regexName, $firstName)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['firstName'] = 'Saisie invalide';
    }
    // verifie si le champs de nom et vide
    if (empty($firstName)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['firstName'] = 'Champ obligatoire';
    }
}
if (isset($_POST['pseudo'])) {
    //déclarion de la variable pseudo avec le htmlspecialchar 
    $pseudo = htmlspecialchars($_POST['pseudo']);
    //test de la regex si elle est invalide
//    if (!preg_match($regexPseudo, $_POST['pseudo'])) {
//        //stocker dans le tableau le rapport d'erreur
//        $formError['pseudo'] = 'Saisie invalide';
//    }
        // verifie si le champs de nom et vide
        if (empty($_POST['pseudo'])) {
            //stocker dans le tableau le rapport d'érreur
            $formError['pseudo'] = 'Champ obligatoire';
        }
    }
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
            $formError['password'] = 'Mot de passe incorrect, votre mot de passe doit comporter 8 à 10 caractères (minuscules, MAJUSCULES, chiffres UNIQUEMENT)';
        }
        // verifie si le champs de nom et vide
        if (empty($_POST['password'])) {
            //stocker dans le tableau le rapport d'érreur
            $formError['password'] = 'Champ obligatoire';
        }
    }
    if (isset($_POST['passwordCheck'])) {
        //déclarion de la variable pseudo avec le htmlspecialchar 
        $passwordCheck = htmlspecialchars($_POST['passwordCheck']);
        //test de la regex si elle est invalide
        if ($passwordCheck != $password) {
            //stocker dans le tableau le rapport d'erreur
            $formError['passwordCheck'] = 'retapez votre mot de passe';
        }
        // verifie si le champs de nom et vide
        if (empty($_POST['passwordCheck'])) {
            //stocker dans le tableau le rapport d'érreur
            $formError['passwordCheck'] = 'Champ obligatoire';
        }
    }
    if (isset($_POST['specialities'])) {
        //déclarion de la variable town avec le htmlspecialchar 
        $specialities = htmlspecialchars($_POST['specialities']);
    } else {
        $formError['specialities'] = 'Choix obligatoire';
    }
    if (isset($_POST['present'])) {
        //déclarion de la variable town avec le htmlspecialchar 
        $present = htmlspecialchars($_POST['present']);
        //test de la regex si elle est invalide
        if (strlen($present) > 2000) {
            //stocker dans le tableau le rapport d'erreur
            $formError['present'] = '2 000 caractères maximum';
        }
        if (empty($_POST['passwordCheck'])) {
            //stocker dans le tableau le rapport d'érreur
            $formError['present'] = 'Champ obligatoire';
        }
    }
//if (empty($_POST['fileToUpload'])) {
//    $formError['fileToUpload'] = 'Image obligatoire';
//}
    if (isset($_POST['submit']) && !empty($_FILES['fileToUpload']['name'])) {

        $uploadError = [];

        $fileToUpload = $_FILES['fileToUpload'];
        $file = pathinfo($_FILES['fileToUpload']['name']);

        $target_dir = "./img/profilePicture/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000 || $_FILES["fileToUpload"]["size"] == 0) {
            $uploadError['size'] = 'Fichier trop lourd';
            $uploadOk = 0;
        }

        if (!isset($uploadError)) {
// Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadError['NaImage'] = 'Le fichier n\'est pas une image';
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            $uploadError['exist'] = 'Ce fichier existe déjà';
            $uploadOk = 0;
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadError['type'] = 'Uniquement les extensions JPG, JPEG, PNG & GIF sont autorisées';
            $uploadOk = 0;
        }
//    if ($check['0'] != $check['1']) {
//        echo "format carré demandé";
//        $uploadOk = 0;
//    }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $uploadError['uploadNotOK'] = 'Fichier non-enregistré';
// if everything is ok, try to upload file
        } else {
            if (count($uploadError) == 0 && count($formError) == 0) {
                $artist->lastName = $lastName;
                $artist->firstName = $firstName;
                $artist->nickName = $pseudo;
                $artist->mail = $mail;
                $artist->password = $password;

                $bio->profilePicture = $file['basename'];
                $bio->idSpeciality = $specialities;
                $bio->present = $present;

                $exist = $artist->alreadyExist();

                if ($exist == TRUE) {
                    $addOK = FALSE;
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $addOK = TRUE;
                        $artist->addUser();
                        $lastArtist = new user();
                        $lastArtistId = $lastArtist->lastUser();

                        var_dump($lastArtistId);
                        $bio->idUser = $lastArtistId->lastId;
                        $bio->addBio();
//                    header('location:index.php?page=validate');
                    } else {
                        echo "Désolé, une erreur a eu lieu lors du téléchargement";
                    }
                }
            }
        }
    }
    