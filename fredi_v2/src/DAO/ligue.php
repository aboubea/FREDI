<?php

class ligue {

  private $libelle_ligue ="???";


  function __construct(array $tableau = null) {
    if ($tableau != null) {
          $this->hydrater($tableau);
   }
  }

  function get_libelle_ligue(){
  return $this->libelle_ligue;
  }

  function set_libelle_ligue($libelle_ligue){
  $this->libelle_ligue= $libelle_ligue;
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
