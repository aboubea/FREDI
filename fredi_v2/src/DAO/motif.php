<?php

class motif {

  private $libelle_motif ="???";


  function __construct(array $tableau = null) {
    if ($tableau != null) {
          $this->hydrater($tableau);
   }
  }

  function get_libelle_motif(){
  return $this->libelle_motif;
  }

  function set_libelle_motif($libelle_motif){
  $this->libelle_motif= $libelle_motif;
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
