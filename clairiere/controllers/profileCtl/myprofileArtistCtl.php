<?php

require_once 'models/users.php';
require_once 'models/artWorks.php';
require_once 'models/workStyles.php';

if (isset($_GET['id'])) {

    $artist = new user();
    $artist->idUser = $_GET['id'];
    $artistById = $artist->userById();

    $artWork1 = new artWork();
    $artWork1->idUser = $_GET['id'];
    $ListArtWorkByArtist = $artWork1->artWorkByArtist();

    $workStyle = new workStyle();
    $listWorkStyles = $workStyle->listStyles();

    if (isset($_SESSION['user'])) {
        
        $connectingArtist = new user();
        $connectingArtist = $_SESSION['user'];

        if (isset($_POST['deleteArtWork']) && isset($_GET['delete'])) {
            $artWork2 = new artWork();
            $artWork2->idArtWork = htmlspecialchars($_GET['delete']);
            $deletedArtWork = $artWork2->SeeArtWork();
            $file = './img/artWorks/' . $deletedArtWork->picture;
            unlink($file);
            $artWork2->deleteArtWork();
//        header('Location:./index.php?page=validateDelete');
        }
//Déclaration des regex
//Déclaration regex nom
        $regexText = '/^[A-zà-Ÿ -\'\!,;.:?]+$/';
//Déclaration regex nom
        $regexTextAndNumber = '/^[0-9a-zA-Zà-Ÿ\- \!\',;.:?]+$/';
//Déclaration regex password
        $regexDate = '/^[0-9]{4}+$/';
        $formError = [];
        $modifOK = TRUE;

        if (isset($_POST['title'])) {
            //déclarion de la variable pseudo avec le htmlspecialchar 
            $title = htmlspecialchars($_POST['title']);
            //test de la regex si elle est invalide
            if (!preg_match($regexText, $title)) {
                //stocker dans le tableau le rapport d'erreur
                $formError['title'] = 'Saisie invalide';
            }
            // verifie si le champs de nom et vide
            if (empty($title)) {
                //stocker dans le tableau le rapport d'érreur
                $formError['title'] = 'Champ obligatoire';
            }
        }

        if (isset($_POST['technic'])) {
            //déclarion de la variable pseudo avec le htmlspecialchar 
            $technic = htmlspecialchars($_POST['technic']);
            //test de la regex si elle est invalide
            if (!preg_match($regexTextAndNumber, $_POST['technic'])) {
                //stocker dans le tableau le rapport d'erreur
                $formError['technic'] = 'Saisie invalide';
            }
            // verifie si le champs de nom et vide
            if (empty($_POST['technic'])) {
                //stocker dans le tableau le rapport d'érreur
                $formError['technic'] = 'Champ obligatoire';
            }
        }
        if (isset($_POST['date'])) {
            //déclarion de la variable password avec le htmlspecialchar 
            $date = htmlspecialchars($_POST['date']);
            //test de la regex si elle est invalide
            if (!preg_match($regexDate, $date)) {
                //stocker dans le tableau le rapport d'erreur
                $formError['date'] = 'date incorrect';
            }
            // verifie si le champs de nom et vide
            if (empty($_POST['date'])) {
                //stocker dans le tableau le rapport d'érreur
                $formError['date'] = 'Champ obligatoire';
            }
        }


        if (isset($_POST['workStyle'])) {
            //déclarion de la variable town avec le htmlspecialchar 
            $workStyle = htmlspecialchars($_POST['workStyle']);
        } else {
            $formError['workStyle'] = 'Choix obligatoire';
        }

        if (isset($_POST['description'])) {
            //déclarion de la variable town avec le htmlspecialchar 
            $description = htmlspecialchars($_POST['description']);
            //test de la regex si elle est invalide
            if (strlen($description) > 2000) {
                //stocker dans le tableau le rapport d'erreur
                $formError['description'] = '2 000 caractères maximum';
            }
            if (empty($_POST['description'])) {
                //stocker dans le tableau le rapport d'érreur
                $formError['description'] = 'Champ obligatoire';
            }
        }

        if (isset($_POST['submitModif']) && isset($_GET['modif'])) {

            $uploadError = [];

            $fileToUpload = $_FILES['fileToUpload'];
            $file = pathinfo($_FILES['fileToUpload']['name']);
            var_dump($fileToUpload);
            $target_dir = "./img/artWorks/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadError['NaImage'] = 'Le fichier n\'est pas une image';
                $uploadOk = 0;
            }
// Check if file already exists
            if (file_exists($target_file)) {
                $uploadError['exist'] = 'Ce fichier existe déjà';
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $uploadError['size'] = 'Fichier trop lourd';
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

                    $artWorkModif = new artWork();
                    $artWorkModif->idArtWork = $_GET['modif'];
                    $modifiedArtWork = $artWorkModif->SeeArtWork();

                    $fileToDelete = './img/artWorks/' . $modifiedArtWork->picture;
                    unlink($fileToDelete);

                    $artWorkModif->title = $title;
                    $artWorkModif->technic = $technic;
                    $artWorkModif->date = $date;
                    $artWorkModif->description = $description;
                    $artWorkModif->picture = $file['basename'];
                    $artWorkModif->idUser = $_GET['id'];
                    $artWorkModif->idWorkStyle = $workStyle;

                    $exist = $artWorkModif->alreadyExist();

                    if ($exist == TRUE) {
                        $modifOK = FALSE;
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $modifOK = TRUE;
                            $artWorkModif->updateArtWork();
                        } else {
                            echo "Désolé, une erreur a eu lieu lors du téléchargement";
                        }
                    }
                }
            }
        }
    }
}
