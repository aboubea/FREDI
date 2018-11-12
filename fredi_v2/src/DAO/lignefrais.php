<?php


class lignefrais{

private $date_frais="???";
private $trajet_frais="???";
private $cout_peage="???";
private $cout_repas="???";
private $cout_hebergement="???";

function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

function get_annee(){
return $this->annee;
}

function set_annee($annee){
$this->annee= $annee;
}

function get_tarif_kilometrique(){
return $this->tarif_kilometrique;
}


function set_tarif_kilometrique($tarif_kilometrique){
$this->tarif_kilometrique= $tarif_kilometrique;
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
