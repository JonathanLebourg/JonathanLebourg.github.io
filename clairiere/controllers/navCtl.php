<?php
//on fait un require pour appeler les modeles speciagtiyies et workStyles
//pour pouvoir ensuite généré les listes pour les dropdown de la navbar
require_once 'models/specialities.php';
require_once 'models/workStyles.php';
//SPECIALITES
$speciality = new speciality();
$listSpecialities = $speciality->listSpec();
//STYLES
$workStyle = new workStyle();
$listStyles = $workStyle->listStyles(); 