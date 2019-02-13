<?php

require_once 'models/artWorks.php';

$artWork1 = new artWork();


if (isset($_GET['style'])) {
    if ($_GET['style'] == 'tout') {
        $listArtWorks = $artWork1->listArtWorks();
    } else {
        foreach ($listStyles as $style) {
            if ($_GET['style'] == $style->workStyle) {
                $searchOrder = $style->idWorkStyle;
                $listArtWorks = $artWork1->listArtWorksByStyle($searchOrder);
            }
        }
    }
} else {
    $listArtWorks = $artWork1->listArtWorks();
}
?>
