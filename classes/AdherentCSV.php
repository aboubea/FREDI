<?php

class AdherentCSV { 

private $licence_adh_csv="";
private $nom_adh_csv="";
private $prenom_adh_csv=""; 
private $sexe_adh_csv="";
private $date_naissance_adh_csv="";
private $adresse_adh_csv="";
private $cp_adh_csv="";
private $ville_adh_csv="";

// function construct
function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

// function destruct
function __destruct()
{

}

// function get & set
 function getLicence_adh_csv(){
  return $this->licence_adh_csv;
}

 function setLicence_adh_csv($licence_adh_csv){
  $this->licence_adh_csv = $licence_adh_csv;
}

 function getNom_adh_csv(){
  return $this->nom_adh_csv;
}

 function setNom_adh_csv($nom_adh_csv){
  $this->nom_adh_csv = $nom_adh_csv;
}

 function getPrenom_adh_csv(){
  return $this->prenom_adh_csv;
}

 function setPrenom_adh_csv($prenom_adh_csv){
  $this->prenom_adh_csv = $prenom_adh_csv;
}

 function getSexe_adh_csv(){
  return $this->sexe_adh_csv;
}

 function setSexe_adh_csv($sexe_adh_csv){
  $this->sexe_adh_csv = $sexe_adh_csv;
}

 function getDate_naissance_adh_csv(){
  return $this->date_naissance_adh_csv;
}

 function setDate_naissance_adh_csv($date_naissance_adh_csv){
  $this->date_naissance_adh_csv = $date_naissance_adh_csv;
}

 function getAdresse_adh_csv(){
  return $this->adresse_adh_csv;
}

 function setAdresse_adh_csv($adresse_adh_csv){
  $this->adresse_adh_csv = $adresse_adh_csv;
}

 function getCp_adh_csv(){
  return $this->cp_adh_csv;
}

 function setCp_adh_csv($cp_adh_csv){
  $this->cp_adh_csv = $cp_adh_csv;
}

 function getVille_adh_csv(){
  return $this->ville_adh_csv;
}

 function setVille_adh_csv($ville_adh_csv){
  $this->ville_adh_csv = $ville_adh_csv;
}

//hydrateur
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