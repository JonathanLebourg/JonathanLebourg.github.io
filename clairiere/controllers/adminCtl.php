<?php

require_once 'models/users.php';
require_once 'models/biography.php';
require_once 'models/artWorks.php';
//ON CREE NOS OBJETS
$user = new user();
$bio = new biography();
$spec = new speciality();
$artWork = new artWork();
//ON GENERE NOS LISTES AVEC NOS FONCTIONS DE CHAQUES MODELS
$listUsers = $user->listUsers();
$listBio = $bio->listBio();
$listSpec = $spec->listSpec();
$listArtWorks = $artWork->listArtWorks();
//DETERMINER LE NOMBRES D UTILISATEURS
$countUsers = $user->usersCount();
$countClients = $user->clientsCount();
$countArtists = $user->artistsCount();
$countArtWorks = $artWork->artWorksCount();


if (isset($_POST['deleteUser'])) {

    $user->idUser = htmlspecialchars($_GET['user']);

    $userById = $user->userById();
    $userById->idUser = $userById->userId;

    if ($userById->idUserType == 1) {
        echo 'IMPOSSIBLE D EFFACER L ADMINISTRATEUR';
    }
    if ($userById->idUserType == 3) {
        $user->deleteUser();
    }
    if ($userById->idUserType == 2) {
        $bioToDelete = new biography();
        $bioToDelete->idUser = $userById->userId;
        $deletedBio = $bioToDelete->bioByIdUser();
        $file = './img/profilePicture/' . $deletedBio->profilePicture;
        unlink($file);
        $bioToDelete->deleteBio();
        $user->deleteUser();
//        unlink;
//        delete artworks
//        unlink profile picture
//        delete bio
//        delete user
    }
}

if (isset($_POST['deleteWork'])) {
    $artWork2 = new artWork();
    $artWork2->idArtWork = htmlspecialchars($_GET['id']);
    $deletedArtWork = $artWork2->SeeArtWork();
    $file = './img/artWorks/' . $deletedArtWork->picture;
    unlink($file);
    $artWork2->deleteArtWork();
    $artWork->deleteArtWork();
}
?>

