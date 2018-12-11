<?php

class Adherent {

private $licence_adh="";
private $nom_adh;
private $prenom_adh; 
private $sexe_adh;
private $date_naissance_adh;
private $adresse_adh;
private $cp_adh;
private $ville_adh;
private $mail_inscrit;
private $mdp_inscrit;
private $id_club;
private $id_resp_leg;

// function construct
function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

// function get & set
 function getLicence_adh(){
  return $this->licence_adh;
}

 function setLicence_adh($licence_adh){
  $this->licence_adh = $licence_adh;
}

 function getNom_adh(){
  return $this->nom_adh;
}

 function setNom_adh($nom_adh){
  $this->nom_adh = $nom_adh;
}

 function getPrenom_adh(){
  return $this->prenom_adh;
}

 function setPrenom_adh($prenom_adh){
  $this->prenom_adh = $prenom_adh;
}

 function getSexe_adh(){
  return $this->sexe_adh;
}

 function setSexe_adh($sexe_adh){
  $this->sexe_adh = $sexe_adh;
}

 function getDate_naissance_adh(){
  return $this->date_naissance_adh;
}

 function setDate_naissance_adh($date_naissance_adh){
  $this->date_naissance_adh = $date_naissance_adh;
}

 function getAdresse_adh(){
  return $this->adresse_adh;
}

 function setAdresse_adh($adresse_adh){
  $this->adresse_adh = $adresse_adh;
}

 function getCp_adh(){
  return $this->cp_adh;
}

 function setCp_adh($cp_adh){
  $this->cp_adh = $cp_adh;
}

 function getVille_adh(){
  return $this->ville_adh;
}

 function setVille_adh($ville_adh){
  $this->ville_adh = $ville_adh;
}

 function getMail_inscrit(){
  return $this->mail_inscrit;
}

 function setMail_inscrit($mail_inscrit){
  $this->mail_inscrit = $mail_inscrit;
}

 function getMdp_inscrit(){
  return $this->mdp_inscrit;
}

 function setMdp_inscrit($mdp_inscrit){
  $this->mdp_inscrit = $mdp_inscrit;
}

function getId_club(){
  return $this->id_club;
 }

function setId_club($id_club){
  $this->id_club = $id_club;
 }

function getId_resp_leg(){
  return $this->id_resp_leg;
 }

function setId_resp_leg($id_resp_leg){
  $this->id_resp_leg = $id_resp_leg;
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