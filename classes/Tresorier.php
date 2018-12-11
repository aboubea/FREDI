<?php

class Tresorier {

  private $id_tredorier;
  private $nom_tresorier;
  private $prenom_tresorier;
  private $mail_tresorier;
  private $mdp_tresorier;
  private $adresse;
  private $id_club;
  private $id_note_frais;


  function __construct(array $tableau = null) {
    if ($tableau != null) {
          $this->hydrater($tableau);
   }
  }

  public function getid_tresorier(){
    return $this->id_tresorier;
   }

   public function setid_tresorier($id_tresorier){
    $this->id_tresorier = $id_tresorier;
   }
   
   public function getnom_tresorier(){
    return $this->nom_tresorier;
   }

   public function setnom_tresorier($nom_tresorier){
    $this->nom_tresorier = $nom_tresorier;
   }
   
   public function getprenom_tresorier(){
    return $this->prenom_tresorier;
   }

   public function setprenom_tresorier($prenom_tresorier){
    $this->prenom_tresorier = $prenom_tresorier;
   }
   
   public function getmail_tresorier(){
    return $this->mail_tresorier;
   }

   public function setmail_tresorier($mail_tresorier){
    $this->mail_tresorier = $mail_tresorier;
   }
   
   public function getmdp_tresorier(){
    return $this->mdp_tresorier;
   }

   public function setmdp_tresorier($mdp_tresorier){
    $this->mdp_tresorier = $mdp_tresorier;
   }
   
   public function getadresse(){
    return $this->adresse;
   }

   public function setadresse($adresse){
    $this->adresse = $adresse;
   }
   
   public function getid_club(){
    return $this->id_club;
   }

   public function setid_club($id_club){
    $this->id_club = $id_club;
   }
   
   public function getid_note_frais(){
    return $this->id_note_frais;
   }

   public function setid_note_frais($id_note_frais){
    $this->id_note_frais = $id_note_frais;
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