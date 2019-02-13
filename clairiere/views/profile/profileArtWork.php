<?php
require 'controllers/profileCtl/profileArtWorkCtl.php';
?>

<div class="container">
    <div class="row">
        <div class="col s4 m4">
            <div class="card white darken-1">
                <div class="card white darken-1">
                    <hr>
                    <h1><b><?= $workById->title ?></b></h1>
                    <hr>
                </div>
                <div class="card white darken-1">
                    <p>Artiste : 
                        <a class="black-text" href="index.php?page=myprofileArtist&id=<?= $workById->idUser; ?>"><?= $workById->nickName ?>
                        </a>
                    </p>
                </div>
                <div class="card white darken-1 center-align">
                    <div class="row">
                        <p><?= $workById->technicalDescription ?></p> 
                    </div>
                    <div class="row">
                        <p><i><?= $workById->optionalDescription ?></i></p>
                    </div>
                    <div class="row">
                        <p>Date : <i><?= $workById->date ?></i></p>
                    </div>
                </div>
                <div class="card white darken-1">                    
                    <p> Prix : <b><?= $workById->price ?> €</b></p>
                </div>
                <div class="card white darken-1">                    
                    <form method="POST" action="">
                        <input class="btn validateButton" type="submit" name="submitWorkInterest" value="je suis interessé" />
                    </form>
                </div>
                <?php if (isset($_SESSION['user']) && ($_SESSION['user']->idUserType == 2)) { ?>
                    <div class="card white darken-1">                    
                        <button class="btn modal-trigger validateButton" type="button" name="button">Modifier</button>
                        <button class="btn modal-trigger validateButton" type="button" name="button">Supprimer</button>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col s4 m8">
            <div class="card white darken-1 hoverable">
                <img src="./img/artWorks/<?= $workById->picture ?>" class="responsive-img" alt="artWork"/>                    
            </div>
        </div>
    </div>
</div>


