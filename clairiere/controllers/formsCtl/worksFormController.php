<?php

require_once 'models/workStyles.php';
require_once 'models/artWorks.php';
require_once 'models/modalities.php';

$workStyle = new workStyle();
$listWorkStyles = $workStyle->listStyles();

$modality = new modality();
$listModalities = $modality->listModalities();

$artWork = new artWork();

//Déclaration des regex
$regexText = '/^[A-zà-Ÿ -\'\!,;.:?]+$/';
$regexTextAndNumber = '/^[0-9a-zA-Zà-Ÿ\- \!\',;.:?]+$/';
//Déclaration regex date
$regexDate = '/^[0-9]{4}+$/';
$regexPrice = '/^[0-9]+$/';
$formError = [];
$addOK = TRUE;


if (isset($_POST['title'])) {
//déclarion de la variable titre avec le htmlspecialchar 
    $title = htmlspecialchars($_POST['title']);
    if (empty($title)) {
//stocker dans le tableau le rapport d'érreur
        $formError['title'] = 'Champ obligatoire';
    }
}
if (isset($_POST['workStyle'])) {
//déclarion de la variable workStyle avec le htmlspecialchar 
    $workStyle = htmlspecialchars($_POST['workStyle']);
} else {
//stocker dans le tableau le rapport d'érreur
    $formError['workStyle'] = 'Champ obligatoire';
}
if (isset($_POST['modality'])) {
//déclarion de la variable workStyle avec le htmlspecialchar 
    $modality = htmlspecialchars($_POST['modality']);
} else {
//stocker dans le tableau le rapport d'érreur
    $formError['modality'] = 'Champ obligatoire';
}
if (isset($_POST['price'])) {
    //déclarion de la variable password avec le htmlspecialchar 
    $price = htmlspecialchars($_POST['price']);
    //test de la regex si elle est invalide
    if (!preg_match($regexPrice, $price)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['price'] = 'prix incorrect';
    }
//    // verifie si le champs de nom et vide
//    if (empty($_POST['price'])) {
//        //stocker dans le tableau le rapport d'érreur
//        $formError['price'] = 'Champ obligatoire';
//    }
}
if (isset($_POST['technicalDescription'])) {
    //déclarion de la variable town avec le htmlspecialchar 
    $technicalDescription = htmlspecialchars($_POST['technicalDescription']);
    //test de la regex si elle est invalide
    if (strlen($technicalDescription) > 2000) {
        //stocker dans le tableau le rapport d'erreur
        $formError['technicalDescription'] = '2 000 caractères maximum';
    }
}
if (isset($_POST['optionalDescription'])) {
    //déclarion de la variable town avec le htmlspecialchar 
    $optionalDescription = htmlspecialchars($_POST['optionalDescription']);
    //test de la regex si elle est invalide
    if (strlen($optionalDescription) > 2000) {
        //stocker dans le tableau le rapport d'erreur
        $formError['optionalDescription'] = '2 000 caractères maximum';
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
}


if (isset($_POST['submitArtWork']) && !empty($_FILES['fileToUpload']['name'])) {

    $uploadError = [];

    $fileToUpload = $_FILES['fileToUpload'];
    $file = pathinfo($_FILES['fileToUpload']['name']);

    $target_dir = "./img/artWorks/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 2000000) {
        $uploadError['size'] = 'Fichier trop lourd';
        $uploadOk = 0;
    }
      if (!isset($uploadError)){
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
            
            $artWork->idUser = $_GET['id'];
            $artWork->title = $title;
            $artWork->idWorkStyle = $workStyle;
            $artWork->technicalDescription = $technicalDescription;
            $artWork->optionalDescription = $optionalDescription;
            $artWork->idModality = $modality;
            $artWork->price = $price;
            $artWork->date = $date;
            $artWork->picture = $file['basename'];
     
            $exist = $artWork->alreadyExist();

            if ($exist == TRUE) {
                $addOK = FALSE;
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $addOK = TRUE;
                    $artWork->addArtWork();
                } else {
                    echo "Désolé, une erreur a eu lieu lors du téléchargement";
                }
            }
        }
    }
}
?>
