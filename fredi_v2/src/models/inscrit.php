<?php


class insrcit{

private $mail_inscrit ="???";
private $mdp_inscrit="???";

function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

function get_mail_inscrit(){
return $this->mail_inscrit;
}

function set_mail_inscrit($mail_inscrit){
$this->mail_inscrit= $mail_inscrit;
}

function get_mdp_inscrit(){
return $this->mdp_inscrit;
}


function set_mdp_inscrit($mdp_inscrit){
$this->mdp_inscrit= $mdp_inscrit;
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
