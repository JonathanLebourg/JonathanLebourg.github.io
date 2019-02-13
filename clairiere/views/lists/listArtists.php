<?php
require 'controllers/listsCtl/listArtistsCtl.php';
?>
<div class="container-fluid">
    <hr>
    <h1><b>NOS ARTISTES</b></h1>
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col s6 m2 borderArtist">
            <p><b>trier par...</b></p>
        </div>
        <div class="col s6 m9">
            <?php foreach ($listArtist as $artist) { ?>
                <a class="black-text" href="index.php?page=myprofileArtist&id=<?= $artist->idUser ?>">
                    <div class="row border hoverable">
                        <div class="col s10 offset-s1 m4">
                            <img class="responsive-img" src="./img/profilePicture/<?= $artist->profilePicture ?>"/>                    
                        </div>
                        <div class="col s10 offset-s1 m8">
                            <hr>
                            <div><h1><b><?= $artist->nickName ?></b></h1></div>
                            <hr>
                            <div><b><?= $artist->speciality ?></b></div>
                            <div><?= $artist->present ?></div>  
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>
