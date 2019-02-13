<?php
//On indique le dossier images
$chem_img = "./img/artWorks";
//On ouvre le dossier images
$handle = opendir($chem_img);
//On parcoure chaque élément du dossier
while ($file = readdir($handle)) {
    //Si les fichiers sont des images
    if (preg_match("!(\.jpg|\.jpeg|\.gif|\.bmp|\.png)$!i", $file)) {
        $listef[] = $file;
    }
}
$random_img = rand(0, count($listef) - 1); //permet de prendre une image totalement au hasard (RANDom) parmi toutes les images trouvées.
//On calcule la largeur et la hauteur de l'image aléatoire
$size = getimagesize($chem_img . "/" . $listef[$random_img]);
//Largeur maximale de l'image pour la création des miniatures
$hauteur_maxi = 260;
//Si la largeur dépasse la limite autorisée...
if ($size[1] > $hauteur_maxi) {
    //...la nouvelle largeur est égale à la limite à ne pas dépasser
    $height = $hauteur_maxi;
    //La largeur d'origine divisée par la largeur limitée (on obtient un chiffre qui sert à faire la même proportion pour la hauteur)
    $theight = ($size[1] / $hauteur_maxi);
    //La hauteur originale est divisée par le chiffre obtenu précédemment afin que l'image conserve les mêmes proportions que l'originale (mais en mode vignette)
    $width = ($size[0] / $theight);
} else {
    //Sinon on garde la taille originale
    $width = $size[0];
    $height = $size[1];
}
//On ferme le dossier
closedir($handle);

