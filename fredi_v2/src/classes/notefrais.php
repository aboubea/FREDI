<?php

class notefrais {
  private $id_note;

  function __construct(array $tableau = null) {
  if ($tableau != null) {
      $this->hydrater($tableau);
  }
  }

  function getId_note(){
    return $this->$id_note;
  }

  function setId_note($id_note){
    $this->id_note = $id_note;
  }


  function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
