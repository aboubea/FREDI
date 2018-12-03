<?php

class motif {

  private $id_ligue;
  private $libelle_motif;


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
  
   public function getLibelle_motif(){
    return $this->libelle_motif;
   }
  
   public function setLibelle_motif($libelle_motif){
    $this->libelle_motif = $libelle_motif;
   }

// hydrateur
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
