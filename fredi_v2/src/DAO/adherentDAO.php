<?php

/**
 * Classe d'accès AdherentDAO
 *
 * @author Paco
 */

class AdherentDAO extends DAO {

  /**
   * Lecture d'un adherent par son ID
   *
   * @param type $id_adherent
   * @return \Adherent
   */
  function find($id_adherent) {
    $sql = "select * from adherent where id_adh=:id_adh";
    $params = array(":id_adh" => $id_adh);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    //TODO : si le fetch ne retourne rien, $row=false et ça plante l'hydrateur
    $adherent = new Adherent($row);
    // Retourne l'objet métier
    return $adherent;
  }

  /**
   * Lecture de tous les adherents
   * @return \Adherent
   */
  function findAll() {
    $sql = "select * from adherent";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Adherent($row);
    }
    // Retourne un tableau d'objets métier
    return $tableau;
  }

  /**
   * Retourne tous les adherents identifié par un login
   * @return array \Adherent
   */
  function findAllByLogin($login) {
    $sql = "select * from adherent where mail_inscrit=:mail_inscrit";
    $params = array(":mail_inscrit" => $mail_inscrit);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Adherent($row);
    }
    // Retourne un tableau d'objets métier
    return $tableau;
  }

  /**
   * Ajoute un adherents
   * @param Adherent $adherent
   * @return type
   */
  function insert(Adherent $adherent) {
    $sql = "insert into adherent (mail_inscrit, mdp_inscrit) values (:login, :mdp_inscrit)";
    $params = array(
        ":mail_inscrit" => $utilisateur->get_mail_inscrit(),
        ":mdp_inscrit" => $utilisateur->get_mdp_inscrit()
    );
    $sth = $this->executer($sql, $params);
    $nb = $sth->rowcount();
    return $nb;  // Retourne le nombre de mise à jour
  }

}

// Classe AdherentDAO
