<?php
class BDD {
  public $BDD;
  public function __construct() {
      try {
           $this->BDD = new PDO('mysql:host=localhost;dbname=clairierePRO','jonathan','admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  
      } catch (Exception $error) {
          die('Erreur de connexion : ' . $error ->getMessage());
      }  
  }  
  public function __destruct() {
      $this->BDD = NULL;
  }
}

?>
