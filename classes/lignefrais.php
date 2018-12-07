<?php

class lignefrais {
    private $id_ligne_frais;
    private $date_frais;
    private $trajet_frais;
    private $km_parcourus;
    private $cout_peage;
    private $cout_repas;
    private $cout_hebergement;
    private $annee;
    private $id_motif;

    function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

function getid_motif() {
    return $this->id_motif;
}

function getannee() {
    return $this->annee;
}
    function getid_ligne_frais() {
        return $this->id_ligne_frais;
    }
    function getdate_frais() {
        return $this->date_frais;
    }
    function getkm_parcourus() {
        return $this->km_parcourus;
    }
    function getCout_peage() {
        return $this->cout_peage;
    }
    function getCout_repas() {
        return $this->cout_repas;
    }
    function getCout_hebergement() {
        return $this->cout_hebergement;
    }
    function gettrajet_frais() {
        return $this->trajet_frais;
    }


    function setid_ligne_frais($id_ligne_frais) {
        $this->id_ligne_frais = $id_ligne_frais;
    }
    function setdate_frais($date_frais) {
        $this->date_frais = $date_frais;
    }
    function setkm_parcourus($km_parcourus) {
        $this->km_parcourus = $km_parcourus;
    }
    function setCout_peage($cout_peage) {
        $this->cout_peage = $cout_peage;
    }
    function setCout_repas($cout_repas) {
        $this->cout_repas = $cout_repas;
    }
    function setCout_hebergement($cout_hebergement) {
        $this->cout_hebergement = $cout_hebergement;
    }
    function settrajet_frais($trajet_frais) {
        $this->trajet_frais = $trajet_frais;
    }

    function setid_motif($id_motif) {
        $this->id_motif = $id_motif;
    }

    function setannee($annee) {
        $this->annee = $annee;
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
