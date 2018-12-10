<?php

class notefrais {

  private $id_note_frais;
  private $annee;


  function __construct(array $tableau = null) {
    if ($tableau != null) {
          $this->hydrater($tableau);
   }
  }

  // function get & set
  public function getid_note_frais(){
    return $this->id_note_frais;
   }

   public function setid_note_frais($id_note_frais){
    $this->id_note_frais = $id_note_frais;
   }

   public function getannee(){
    return $this->annee;
   }

   public function setannee($annee){
    $this->annee = $annee;
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