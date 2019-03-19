<?php


class indemnite{

private $annee;
private $tarif_kilometrique;

function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

// function get & set
public function getAnnee(){
  return $this->annee;
 }

 public function setAnnee($annee){
  $this->annee = $annee;
 }

 public function getTarif_kilometrique(){
  return $this->tarif_kilometrique;
 }

 public function setTarif_kilometrique($tarif_kilometrique){
  $this->tarif_kilometrique = $tarif_kilometrique;
 }

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
