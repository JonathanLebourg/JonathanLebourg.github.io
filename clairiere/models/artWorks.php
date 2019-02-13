<?php

require_once 'connectBDD.php';

class artWork extends BDD {
//déclaration des attributs identiques à la table `artWorks`
    public $idArtWork;
    public $title;
    public $technicalDescription;
    public $date;
    public $optionalDescription;
    public $picture;
    public $price;
    public $idUser;
    public $idWorkStyle;
    public $idModality;
//-----------------
//PARTIE GENERALE
//-----------------
//fonction pour lister les oeuvres de la table artWorks
    public function listArtWorks() {
        $query = 'SELECT * FROM `clair_artWorks` '
                . 'LEFT JOIN `clair_users` AS `t1` '
                . 'ON `clair_artWorks`.`idUser` = `t1`.`idUser` '
                . 'INNER JOIN `clair_workStyles` AS `t2` '
                . 'ON `clair_artWorks`.`idWorkStyle` = `t2`.`idWorkStyle` '
                . 'INNER JOIN `clair_modalities` AS `t3` '
                . 'ON `clair_artWorks`.`idModality` = `t3`.`idModality`';
        $list = $this->BDD->query($query);
        $listArtWorks = $list->fetchAll(PDO::FETCH_OBJ);
        return $listArtWorks;
    }
//    fonction qui liste les oeuvres selon leur workStyle 
//    grace à une boucle dans le controller listArtWorkCtl où un foraech détemine le $searchOrder   
    public function listArtWorksByStyle($searchOrder) {
        $query = 'SELECT * FROM `clair_artWorks` '
                . 'LEFT JOIN `clair_users` AS `t1` '
                . 'ON `clair_artWorks`.`idUser` = `t1`.`idUser` '
                . 'INNER JOIN `clair_workStyles` AS `t2` '
                . 'ON `clair_artWorks`.`idWorkStyle` = `t2`.`idWorkStyle` '
                . 'INNER JOIN `clair_modalities` AS `t3` '
                . 'ON `clair_artWorks`.`idModality` = `t3`.`idModality` '
                . 'WHERE `t2`.`idWorkStyle` LIKE ' . $searchOrder;
        $list = $this->BDD->query($query);
        $listArtWorksByStyle = $list->fetchAll(PDO::FETCH_OBJ);
        return $listArtWorksByStyle;
    }
//FONCTION AJOUTER UNE OEUVRE 
    public function addArtWork() {
        $query = 'INSERT INTO `clair_artWorks` '
                . '      SET `title`= :title, '
                . '      `technicalDescription`= :technicalDescription,'
                . '      `date`= :date,'
                . '      `optionalDescription`= :optionalDescription,'
                . '      `picture`= :picture, '
                . '      `price`= :price, '
                . '      `idUser`= :idUser,'
                . '      `idWorkStyle`= :idWorkStyle, '
                . '      `idModality`= :idModality ';
        $addArtWork = $this->BDD->prepare($query);
        $addArtWork->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArtWork->bindValue(':technicalDescription', $this->technicalDescription, PDO::PARAM_STR);
        $addArtWork->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addArtWork->bindValue(':optionalDescription', $this->optionalDescription, PDO::PARAM_STR);
        $addArtWork->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $addArtWork->bindValue(':price', $this->price, PDO::PARAM_INT);
        $addArtWork->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $addArtWork->bindValue(':idWorkStyle', $this->idWorkStyle, PDO::PARAM_INT);
        $addArtWork->bindValue(':idModality', $this->idModality, PDO::PARAM_INT);
        return $addArtWork->execute();
    }
//FONCTION UPDATE UNE OEUVRE    
    public function updateArtWork() {
        $query = 'UPDATE `clair_artWorks` '
                . '      SET `title`= :title, '
                . '      `technicalDescription`= :technicalDescription,'
                . '      `date`= :date,'
                . '      `optionalDescription`= :optionalDescription,'
                . '      `picture`=:picture, '
                . '      `price`=:price, '
                . '      `idUser`= :idUser,'
                . '      `idWorkStyle`= :idWorkStyle, `idnModality` = :idModality '
                . '      WHERE `clair_artWorks`.`idArtWork` = :id';
        $updateArtWork = $this->BDD->prepare($query);
        $addArtWork->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArtWork->bindValue(':technicalDescription', $this->technicalDescription, PDO::PARAM_STR);
        $addArtWork->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addArtWork->bindValue(':optionalDescription', $this->optionalDescription, PDO::PARAM_STR);
        $addArtWork->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $addArtWork->bindValue(':price', $this->price, PDO::PARAM_INT);
        $addArtWork->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $addArtWork->bindValue(':idWorkStyle', $this->idWorkStyle, PDO::PARAM_INT);
        $addArtWork->bindValue(':idModality', $this->idModality, PDO::PARAM_INT);        return $updateArtWork->execute();
    }
//FONCTION EFFACER
    public function deleteArtWork() {
        $query = 'DELETE FROM `clair_artWorks` '
                . 'WHERE `idArtWork` = :idArtWork';
        $deleteArtWork = $this->BDD->prepare($query);
        $deleteArtWork->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        return $deleteArtWork->execute();
    }
//fonction pour vérifier si un utilisateur existe déjà en cherchant avec le titre ET le nom du fichier
    public function alreadyExist() {
        $query = 'SELECT * FROM clair_artWorks '
                . ' WHERE `title`= :title AND `picture`= :picture';
        $alreadyExist = $this->BDD->prepare($query);
        $alreadyExist->bindValue(':title', $this->title, PDO::PARAM_STR);
        $alreadyExist->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $alreadyExist->execute();
        if ($alreadyExist->rowCount() >= 1) {
            $count = TRUE;
        } else {
            $count = FALSE;
        }
        //  si le nombre de ligne trouvées avec la fction rowcount() est 1
//      //  alors le artWork existe déjà
        return $count;
    }
//fonction qui liste les oeuvres par artistes
    public function artWorkByArtist() {
        $query = 'SELECT * FROM `clair_artWorks` '
                . 'INNER JOIN `clair_users` '
                . 'ON `clair_artWorks`.`idUser` = `clair_users`.`idUser` '
                . 'INNER JOIN `clair_workStyles` '
                . 'ON `clair_artWorks`.`idWorkStyle` = `clair_workStyles`.`idWorkStyle` '
                . 'INNER JOIN `clair_modalities` AS `t3` '
                . 'ON `clair_artWorks`.`idModality` = `t3`.`idModality` '
                . 'WHERE `clair_artWorks`.`idUser` = :idUser';
        $listByArtist = $this->BDD->prepare($query);
        $listByArtist->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $listByArtist->execute();
        $artWorkByArtist = $listByArtist->fetchAll(PDO::FETCH_OBJ);
        return $artWorkByArtist;
    }
//fonction pour acceder aux attritubutes d une oeuvre selon on idArtWork
     public function SeeArtWork() {
        $query = 'SELECT * FROM `clair_artWorks` '
                . 'INNER JOIN `clair_users` '
                . 'ON `clair_artWorks`.`idUser` = `clair_users`.`idUser` '
                . 'INNER JOIN `clair_workStyles` '
                . 'ON `clair_artWorks`.`idWorkStyle` = `clair_workStyles`.`idWorkStyle` '
                . 'INNER JOIN `clair_modalities` AS `t3` '
                . 'ON `clair_artWorks`.`idModality` = `t3`.`idModality` '
                . 'WHERE `clair_artWorks`.`idArtWork` = :idArtWork';
        $artWork = $this->BDD->prepare($query);
        $artWork->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        $artWork->execute();
        $artWorkById = $artWork->fetch(PDO::FETCH_OBJ);
        return $artWorkById;
    }
//-----------------
//----STATS
//-----------------
//    fonction pour compter le nombre d'artistes avec la fonction rowcount()
    public function artWorksCount() {
        $query = 'SELECT * FROM `clair_artWorks` ';
        $result = $this->BDD->query($query);
        $result->execute();
        $artWorksCount = $result->rowCount();
        return $artWorksCount;
    }
    
    public function artWorksCountByArtist() {
        $query = 'SELECT * FROM `clair_artWorks` WHERE `clair_artWorks`.`idUser` = :idUser';
        $result = $this->BDD->query($query);
        $result->execute();
        $artWorksCountByArtist = $result->rowCount();
        return $artWorksCountByArtist;
    }
}