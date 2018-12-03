<?php

class ligue {

  private $id_ligue;
  private $libelle_ligue;
  private $nom_ligue;


  function __construct(array $tableau = null) {
    if ($tableau != null) {
          $this->hydrater($tableau);
   }
  }

// function get & set
public function getId_ligue(){
  return $this->id_ligue;
 }

 public function setId_ligue($id_ligue){
  $this->id_ligue = $id_ligue;
 }

 public function getLibelle_ligue(){
  return $this->libelle_ligue;
 }

 public function setLibelle_ligue($libelle_ligue){
  $this->libelle_ligue = $libelle_ligue;
 }

 public function getNom_ligue(){
  return $this->nom_ligue;
 }

 public function setNom_ligue($nom_ligue){
  $this->nom_ligue = $nom_ligue;
 }

  function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
}


















































?>
