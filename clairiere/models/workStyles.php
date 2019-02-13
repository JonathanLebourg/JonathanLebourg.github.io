<?php

require_once 'connectBDD.php';

class workStyle extends BDD {
//déclaration des attributs identiques à la table `workStyles`
    public $idWorkStyle;
    public $workStyle;
//fonction qui liste les styles pour les select des formulaires des oeuvres
    public function listStyles() {
        $query = 'SELECT * FROM `clair_workStyles`';
        $list = $this->BDD->query($query);
        $listStyles = $list->fetchAll(PDO::FETCH_OBJ);
        return $listStyles;
    }
}
