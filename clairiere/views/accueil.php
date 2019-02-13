<?php
include './controllers/accueilCtl.php';
?>
<div class="container-fluid">
    <div class="row">
        <hr> 
        <img class="responsive-img" src="./img/clairiere_logoTEST1.png" alt="logo" width="40%" />
        <hr>
        <div class="row">
            <p><b>"Penser, c'est chercher des clairières dans une forêt."</b>   <i>Jules Renard</i></p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col s12 m4">
            <div class="card white darken-1 hoverable accueilCard">
                <div class="card-content black-text">
                    <div class="row">
                        <a onclick="window.open(this.href, '_blank');return false;" href="<?= $chem_img; ?>/<?= $listef[$random_img]; ?>" onclick="window.open(this.href, '_blank');return false;">
                            <img class="responsive-img" oncontextmenu="return false" style="border:none; width: <?= $width; ?>px ; height: <?= $height; ?>px " src="<?= $chem_img; ?>/<?= $listef[$random_img]; ?>" alt="<?= $listef[$random_img]; ?>" />
                        </a>
                    </div>                   
                </div>
            </div>
        </div>
        <div class="col s12 m8">
            <div class="card white darken-1 hoverable accueilCard">
                <div class="card-content black-text">
                    <div class="accueilText">
                        <p><i>« Une clairière est un lieu ouvert dans une zone boisée où la lumière du soleil arrive jusqu'au sol. Elle est un élément de l'écosystème forestier et peut être une source de produits forestiers autres que le bois. »
                            </i></p>
                    </div>
                    <div class="accueilText">
                        <p>La clairière est un site gratuit qui souhaite donner de la visibilité à toute personne se sentant artiste et souhaitant partager et/ou vendre son travail à toute personne amatrice d’art en tout genre désirant éventuellement acquérir des œuvres.
                            Le site se veut comme un endroit où chaque forme de création peut trouver sa part de lumière.
                            La clairière n’autorise aucuneS transactionS monétaires mais fonctionne comme une plateforme de mise en relation entre artistes et éventuels clients par le biais d’une messagerie.
                            Les artistes pourront après avoir créer leur profil mettre en ligne leurs œuvres avec un visuel et un descriptif en précisant si c’est à vendre et combien. Et de l’autre côtés les visiteurs pourront parcourir les œuvres des artistes et ceux inscrits pourront montrer leur intérêt pour les artistes de leurs choix et entrer en contact avec eux afin d’éventuellement discuter des modalités d’une vente.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>