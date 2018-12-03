<?php

class Club {

private $id_club;
private $libelle_club;
private $id_ligue;

// function construct
function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

 function getId_club(){
  return $this->id_club;
}

 function setId_club($id_club){
  $this->id_club = $id_club;
}

 function getLibelle_club(){
  return $this->libelle_club;
}

 function setLibelle_club($libelle_club){
  $this->libelle_club = $libelle_club;
}

public function getId_ligue(){
  return $this->id_ligue;
 }

 public function setId_ligue($id_ligue){
  $this->id_ligue = $id_ligue;
 }

//hydrateur
function hydrater(array $tableau) {
  foreach ($tableau as $cle => $valeur) {
    $methode = 'set' . $cle;
    if (method_exists($this, $methode)) {
      $this->$methode($valeur);
    }
  }
}
}
 ?>