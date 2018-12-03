<?php

class Responsable_legal {

private $id_resp_leg;
private $nom_resp_leg;
private $prenom_resp_leg;
private $rue_resp_leg;
private $cp_resp_leg;
private $ville_resp_leg;
private $mail_inscrit;
private $mdp_inscrit;


// function construct
function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

// function getter & setter
public function getId_resp_leg(){
  return $this->id_resp_leg;
 }

 public function setId_resp_leg($id_resp_leg){
  $this->id_resp_leg = $id_resp_leg;
 }

 public function getNom_resp_leg(){
  return $this->nom_resp_leg;
 }

 public function setNom_resp_leg($nom_resp_leg){
  $this->nom_resp_leg = $nom_resp_leg;
 }

 public function getPrenom_resp_leg(){
  return $this->prenom_resp_leg;
 }

 public function setPrenom_resp_leg($prenom_resp_leg){
  $this->prenom_resp_leg = $prenom_resp_leg;
 }

 public function getRue_resp_leg(){
  return $this->rue_resp_leg;
 }

 public function setRue_resp_leg($rue_resp_leg){
  $this->rue_resp_leg = $rue_resp_leg;
 }

 public function getCp_resp_leg(){
  return $this->cp_resp_leg;
 }

 public function setCp_resp_leg($cp_resp_leg){
  $this->cp_resp_leg = $cp_resp_leg;
 }

 public function getVille_resp_leg(){
  return $this->ville_resp_leg;
 }

 public function setVille_resp_leg($ville_resp_leg){
  $this->ville_resp_leg = $ville_resp_leg;
 }

 public function getMail_inscrit(){
  return $this->mail_inscrit;
 }

 public function setMail_inscrit($mail_inscrit){
  $this->mail_inscrit = $mail_inscrit;
 }

 public function getMdp_inscrit(){
  return $this->mdp_inscrit;
 }

 public function setMdp_inscrit($mdp_inscrit){
  $this->mdp_inscrit = $mdp_inscrit;
 }

//hydrateur
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
