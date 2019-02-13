<?php

require_once 'models/users.php';

$_SESSION['falseClientId'] = '<p>Vous rencontrez une erreur de connexion ou n\'êtes pas enregistré sur le site<p>';

if (isset($_SESSION['user'])) {

    $client = new user();
    $client = $_SESSION['user'];

    if (isset($_POST['submitClientModif'])) {

        if (isset($_POST['nickName']) && !empty($_POST['nickName'])) {
            $client->nickName = $_POST['nickName'];
            $client->updateUserNickName();
        }
        if (isset($_POST['firstName']) && !empty($_POST['firstName'])) {
            $client->firstName = $_POST['firstName'];
            $client->updateUserFirstName();
        }
        if (isset($_POST['lastName']) && !empty($_POST['lastName'])) {
            $client->lastName = $_POST['lastName'];
            $client->updateUserLastName();
        }
        if (isset($_POST['mail']) && !empty($_POST['mail'])) {
            $client->mail = $_POST['mail'];
            $client->updateUserMail();
        }
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $client->password = $_POST['password'];
            $client->updatePassword();
        }
        $modifiedClient = $client->userById();
        $_SESSION['user'] = $modifiedClient;
    }
}
    
