responsable_legal<?php

class responsable_legal extends inscrit{

//private $licence_resp_leg="???";
private $nom_resp_leg="???";
private $prenom_resp_leg="???";
private $rue_resp_leg="???";
private $cp_resp_leg="???";
private $ville_resp_leg="???";


// function construct
function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

//getter
function get_nom_resp_leg(){
return $this->nom_resp_leg;
}

function get_prenom_resp_leg(){
return $this->prenom_resp_leg;
}

function get_rue_resp_leg(){
return $this->rue_resp_leg;
}


function get_adresse_resp_leg(){
return $this->adresse_resp_leg;
}

function get_cp_resp_leg(){
return $this->cp_resp_leg;
}
function get_ville_resp_leg(){
return $this->ville_resp_leg;
}

//setter
function set_nom_resp_leg($nom_resp_leg){
$this->nom_resp_leg= $nom_resp_leg;
}

function set_prenom_resp_leg(){
$this->prenom_resp_leg= $prenom_resp_leg;
}

function set_rue_resp_leg(){
$this->rue_resp_leg= $rue_resp_leg;
}


function set_adresse_resp_leg(){
$this->adresse_resp_leg= $adresse_resp_leg;
}


function set_cp_resp_leg(){
$this->cp_resp_leg= $cp_resp_leg;
}

function set_ville_resp_leg(){
$this->ville_resp_leg= $ville_resp_leg;
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
