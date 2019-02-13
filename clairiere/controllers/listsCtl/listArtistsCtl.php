<?php

require_once 'models/users.php';

$artist = new user();


if (isset($_GET['speciality'])) {
    if ($_GET['speciality'] == 'tout') {
        $listArtist = $artist->listArtists();
    } else {
        foreach ($listSpecialities as $spec) {
            if ($_GET['speciality'] == $spec->speciality) {
                $searchOrder = $spec->idSpeciality;
                $listArtist = $artist->listArtistsBySpeciality($searchOrder);
            }
        }
    }
} else {
    $listArtist = $artist->listArtists();
}
?>


