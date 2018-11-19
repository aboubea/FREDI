<?php

class adherent extends inscrit{

//private $licence_adh="???";
private $nom_adh="???";
private $prenom_adh="???";
private $sexe_adh="???";
private $date_naissance_adh="???";
private $adresse_adh="???";
private $cp_adh="???";
private $ville_adh="???";


// function construct
function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

//getter
function get_nom_adh(){
return $this->nom_adh;
}

function get_prenom_adh(){
return $this->prenom_adh;
}

function get_sexe_adh(){
return $this->sexe_adh;
}

function get_date_naissance_adh(){
return $this->date_naissance_adh;
}

function get_adresse_adh(){
return $this->adresse_adh;
}

function get_cp_adh(){
return $this->cp_adh;
}
function get_ville_adh(){
return $this->ville_adh;
}

//setter
function set_nom_adh($nom_adh){
$this->nom_adh= $nom_adh;
}

function set_prenom_adh(){
$this->prenom_adh= $prenom_adh;
}

function set_sexe_adh(){
$this->sexe_adh= $sexe_adh;
}

function set_date_naissance_adh(){
$this->date_naissance_adh= $date_naissance_adh;
}
function set_adresse_adh(){
$this->adresse_adh= $adresse_adh;
}


function set_cp_adh(){
$this->cp_adh= $cp_adh;
}

function set_ville_adh(){
$this->ville_adh= $ville_adh;
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
