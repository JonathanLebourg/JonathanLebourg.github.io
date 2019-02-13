<?php

require_once 'connectBDD.php';

class modality extends BDD {
//déclaration des attributs identiques à la table `specialities`
    public $idModality;
    public $modalityType;
//-----------------
//PARTIE GENERALE
//-----------------
//    fonction qui liste les specialités pour les select dnas les formulaires
    public function listModalities() {
        $query = 'SELECT * FROM `clair_modalities`';
        $list = $this->BDD->query($query);
        $listModalities= $list->fetchAll(PDO::FETCH_OBJ);
        return $listModalities;
    }
}
