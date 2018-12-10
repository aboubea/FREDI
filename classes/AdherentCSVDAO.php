<?php

/**
 * Classe d'accès AdherentDAO
 *
 * @author Paco
 */

class AdherentCSVDAO extends DAO {

/**
   * Lecture d'un adherent_csv par sa licence
   *
   * @param type $licence_adh_csv
   * @return \Adherent
   */
  function find($licence_adh_csv) {
    $sql = "select * from adherent_csv where licence_adh_csv=:licence_adh_csv";
    $params = array(
      ":licence_adh_csv" => $licence_adh_csv
    );
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row ==!FALSE) {
      $adherent_csv = new AdherentCSV($row);
    } else {
      $row2 = array(
        ":licence_adh_csv" => "",
        ":nom_adh_csv" => "",
        ":prenom_adh_csv" => "",
        ":sexe_adh_csv"=>"",
        ":date_naissance_adh_csv"=>"",
        ":adresse_adh_csv"=>"",
        ":cp_adh_csv"=>"",
        ":ville_adh_csv" => ""
      );
      $adherent_csv = new AdherentCSV($row2);
    }
    // Retourne l'objet métier
    return $adherent_csv;
  }

  
  /**
   * Lecture de tous les adherents_CSV
   * @return \AdherentCSV
   */
  function findAll() {
    $sql = "select * from adherent_csv";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new AdherentCSV($row);
    }
    // Retourne un tableau d'objets métier
    return $tableau;
  }


  /**
   * Ajoute un adherent_csv
   * @param AdherentCSV $adherent_csv
   * @return type
   */
  function insert($adherent_csv_csv) {
    $sql = "insert into adherent_csv (licence_adh_csv, nom_adh_csv, prenom_adh_csv, sexe_adh_csv, date_naissance_adh_csv, adresse_adh_csv, cp_adh_csv, ville_adh_csv) values (:licence_adh_csv, :nom_adh_csv, :prenom_adh_csv, :sexe_adh_csv, :date_naissance_adh_csv, :adresse_adh_csv, :cp_adh_csv, :ville_adh_csv)";
    $params = array(
      ":licence_adh_csv"=>$adherent_csv->getLicence_adh_csv(),
      ":nom_adh_csv"=>$adherent_csv->getNom_adh_csv(),
      ":prenom_adh_csv"=>$adherent_csv->getPrenom_adh_csv(),
      ":sexe_adh_csv"=>$adherent_csv->getSexe_adh_csv(),
      ":date_naissance_adh_csv"=>$adherent_csv->getDate_naissance_adh_csv(),
      ":adresse_adh_csv"=>$adherent_csv->getAdresse_adh_csv(),
      ":cp_adh_csv"=>$adherent_csv->getCp_adh_csv(),
      ":ville_adh_csv"=>$adherent_csv->getVille_adh_csv()
    );
    $sth = $this->executer($sql, $params);
    $nb = $sth->rowcount();
    return $nb;  // Retourne le nombre de mise à jour
  }

  
}

// Classe AdherentCSVDAO
