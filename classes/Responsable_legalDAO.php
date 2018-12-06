<?php

/**
 * Classe d'accès Responsable_legalDAO
 *
 * @author Paco
 */

class Responsable_legalDAO extends DAO {

  /**
   * Lecture d'un responsable legal par son ID
   *
   * @param type $id_resp_leg
   * @return \Responsable_legal
   */
  function find($id_resp_leg) {
    $sql = "select * from responsable_legal where id_resp_leg=:id_resp_leg";
    $params = array(":id_resp_leg" => $id_resp_leg);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
        $responsable_legal = new Responsable_legal($row);
      } else {
        $responsable_legal = new Responsable_legal();
      }

    // Retourne l'objet métier
    return $responsable_legal;
  }

  /**
   * Lecture de tous les responsable legal
   * @return \Responsable_legal
   */
  function findAll() {
    $sql = "select * from responsable_legal";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Responsable_legal($row);
    }
    // Retourne un tableau d'objets métier
    return $tableau;
  }

  /**
   * Retourne tous les détails d'un responsable legal identifié par son mail
   * @return array \Responsable_legal
   */
  function findAllByLogin($login) {
    $sql = "select * from responsable_legal where mail_inscrit=:mail_inscrit";
    $params = array(":mail_inscrit" => $mail_inscrit);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Responsable_legal($row);
    }
    // Retourne un tableau d'objets métier
    return $tableau;
  }

  /**
* Lecture de tous les adherent(s) d'un responsable legal
* @param int $id_resp_leg l'ID du responsable legal
* @return array \Adherent
*/

function findAllbyIdRespLeg($id_resp_leg) {
    $sql = "select * from adherent where id_resp_leg=:id_resp_leg";
    $params = array(":id_resp_leg" => $id_resp_leg);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Adherent($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }

  /**
   * Ajoute un responsable legal
   *
   * @return int nb de mises à jour
   */
  function insert($responsable_legal) {
    $sql = "insert into responsable_legal (nom_resp_leg, prenom_resp_leg, rue_resp_leg, cp_resp_leg, ville_resp_leg, mail_inscrit, mdp_inscrit) values (:nom_resp_leg, :prenom_resp_leg, :rue_resp_leg, :cp_resp_leg, :ville_resp_leg, :mail_inscrit, :mdp_inscrit)";
    $params = array(
        ":nom_resp_leg" => $responsable_legal->getNom_resp_leg(),
        ":prenom_resp_leg" => $responsable_legal->getPrenom_resp_leg(),
        ":rue_resp_leg" => $responsable_legal->getRue_resp_leg(),
        ":cp_resp_leg" => $responsable_legal->getCp_resp_leg(),
        ":ville_resp_leg" => $responsable_legal->getVille_resp_leg(),
        ":mail_inscrit" => $responsable_legal->getMail_inscrit(),
        ":mdp_inscrit" => $responsable_legal->geMdp_inscrit()
    );
    $sth = $this->executer($sql, $params);
    $nb = $sth->rowcount();
    return $nb;  // Retourne le nombre de mise à jour
  }

  /**
* Modification d'un.e responsable_legal
*
* @return int nb de mises à jour
*/

function update($responsable_legal) {
    $sql = "update responsable_legal set nom_resp_leg=:nom_resp_leg, prenom_resp_leg=:prenom_resp_leg, rue_resp_leg=: rue_resp_leg, cp_resp_leg=:cp_resp_leg, ville_resp_leg=:ville_resp_leg, mail_inscrit=:mail_inscrit, mdp_inscrit=:mdp_inscrit)";
    $params = array(
        ":nom_resp_leg" => $responsable_legal->getNom_resp_leg(),
        ":prenom_resp_leg" => $responsable_legal->getPrenom_resp_leg(),
        ":rue_resp_leg" => $responsable_legal->getRue_resp_leg(),
        ":cp_resp_leg" => $responsable_legal->getCp_resp_leg(),
        ":ville_resp_leg" => $responsable_legal->getVille_resp_leg(),
        ":mail_inscrit" => $responsable_legal->getMail_inscrit(),
        ":mdp_inscrit" => $responsable_legal->geMdp_inscrit()
    );
    $sth = $this->executer($sql,$params);
    $nb = $sth->rowcount();
    // Retourne le nombre de mise à jour
    return $nb;
  }

  /**
* Suppression d'un.e responsable legal
*
* @return int nb de mises à jour
*/

function delete($id_resp_leg) {
    $sql = "delete from responsable_legal where id_resp_leg=:id_resp_leg";
    $params = array(":id_resp_leg" => $id_resp_leg);
    $sth = $this->executer($sql,$params);
    $nb = $sth->rowcount();
    // Retourne le nombre de mise à jour
    return $nb;
  }
}

// Classe Responsable_legalDAO
