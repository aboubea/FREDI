<?php

class lignefrais {
    private $id_ligne;
    private $date;
    private $nb_km;
    private $cout_peage;
    private $cout_repas;
    private $cout_hebergement;
    private $nom_trajet;

    function __construct(array $tableau = null) {
  if ($tableau != null) {
        $this->hydrater($tableau);
 }
}

    function getId_ligne() {
        return $this->id_ligne;
    }

    function getDate() {
        return $this->date;
    }

    function getNb_km() {
        return $this->nb_km;
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

    function getNom_trajet() {
        return $this->nom_trajet;
    }

    function setId_ligne($id_ligne) {
        $this->id_ligne = $id_ligne;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setNb_km($nb_km) {
        $this->nb_km = $nb_km;
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

    function setNom_trajet($nom_trajet) {
        $this->nom_trajet = $nom_trajet;
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
