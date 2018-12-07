<?php

class motif {

  private $id_motif;
  private $libelle_motif;


  function __construct(array $tableau = null) {
    if ($tableau != null) {
          $this->hydrater($tableau);
   }
  }

  // function get & set
  public function getid_motif(){
    return $this->id_motif;
   }

   public function setid_motif($id_motif){
    $this->id_motif = $id_motif;
   }

   public function getLibelle_motif(){
    return $this->libelle_motif;
   }

   public function setLibelle_motif($libelle_motif){
    $this->libelle_motif = $libelle_motif;
   }

// hydrateur
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
