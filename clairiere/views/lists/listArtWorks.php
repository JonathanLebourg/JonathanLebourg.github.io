<?php
require 'controllers/listsCtl/listArtWorksCtl.php';
?>
<div class="container-fluid">
    <hr>
    <h1><b>LEURS OEUVRES</b></h1>
    <hr>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($listArtWorks as $work) { ?>
            <div class="col s12 m4 border hoverable">
                <div class="row imgArtWorkDiv">
                    <a href="index.php?page=artWork&id=<?= $work->idArtWork ?>">
                        <img class="responsive-img imgArtWork" src="./img/artWorks/<?= $work->picture ?>"/>
                    </a>                    
                </div>
                <div class="row">
                    <hr>
                    <div><h2><b><?= $work->title ?></b></h2></div>
                    <hr>
                    <div><p>réalisé par : <a href="index.php?page=myprofileArtist&id=<?= $work->idUser ?>">
                                <b><?= $work->nickName ?></b>
                            </a></p>                                
                    </div>
                    <div><a href="" class="btn validateButton">+ de détails</a></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>