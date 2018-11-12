<?php

class club{

private $libelle_club="???";
private $adresse_club="???";
private $cp_club="???";
private $ville_club="???";


// function construct
function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

//getter
function get_libelle_club(){
return $this->libelle_club;
}

function get_adresse_club(){
return $this->adresse_club;
}

function get_cp_club(){
return $this->cp_club;
}

function get_ville_club(){
return $this->ville_club;
}



//setter
function set_libelle_club($libelle_club){
$this->libelle_club= $libelle_club;
}

function set_adresse_club(){
$this->adresse_club= $adresse_club;
}

function set_cp_club(){
$this->cp_club= $cp_club;
}

function set_ville_club(){
$this->ville_club= $ville_club;
}


//hydrateur
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
