<?php

/**
 * Classe d'accès AdherentDAO
 *
 * @author Paco
 */

class AdherentDAO extends DAO {

  /**
   * Lecture d'un adherent par sa licence
   *
   * @param type $licence_adh
   * @return \Adherent
   */
  function find($licence_adh) {
    $sql = "select * from adherent where licence_adh=:licence_adh";
    $params = array(":licence_adh" => $licence_adh);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $adherent = new Adherent($row);
    } else {
      $adherent = new Adherent();
    }
    // Retourne l'objet métier
    return $adherent;
  }

  /**
   * Lecture d'un adherent par son EMAIL
   *
   * @param type $mail_inscrit
   * @return \Adherent
   */
  function findByMail($mail_inscrit) {
    $sql = "select * from adherent where mail_inscrit=:mail_inscrit";
    $params = array(":mail_inscrit" => $mail_inscrit);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $adherent = new Adherent($row);
    } else {
      $adherent = new Adherent();
    }
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
  * Vérifie si l'utilisateur est bien inscrit
  * @return array \Adherent
  */
  function est_inscrit($mail_inscrit, $mdp_inscrit) {
    try {
    $sql = "select mail_inscrit, mdp_inscrit from adherent where mail_inscrit=:mail_inscrit";
    $params = array(
      ":mail_inscrit" => $mail_inscrit
     );

    //On exécute la requête
    $sth = $this->executer($sql, $params);

    //On récupère le mail et le mot de passe présent dans la BDD pour l'email saisit
    $row = $sth->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    
    // On vérifie le mot de passe (celui rentré dans le formulaire et celui présent da la base de données)
    if (password_verify($mdp_inscrit, $row['mdp_inscrit'])){
      return true ;
    } else {
      return false ;
    }
  }


/**
* Lecture de tous les adherent(s) mineur d\'un responsable legal
* @param int $id_resp_leg l'ID du responsable legal
* @return array \Adherent
*/

function findAllByIdRespLeg($id_resp_leg) {
  $sql = "select * from adherent where id_resp_leg=:id_resp_leg";
  $params = array(
    ":id_resp_leg" => $id_resp_leg
  );
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
   * Ajoute un adherents
   * @param Adherent $adherent
   * @return type
   */
  function insert($adherent, $id_resp_leg) {
    $sql = "insert into adherent (licence_adh, nom_adh, prenom_adh, sexe_adh, date_naissance_adh, adresse_adh, cp_adh, ville_adh, mail_inscrit, mdp_inscrit, id_club, id_resp_leg) values (:licence_adh, :nom_adh, :prenom_adh, :sexe_adh, :date_naissance_adh, :adresse_adh, :cp_adh, :ville_adh, :mail_inscrit, :mdp_inscrit, :id_club, :id_resp_leg)";
    $params = array(
      ":licence_adh"=>$adherent->getLicence_adh(),
      ":nom_adh"=>$adherent->getNom_adh(),
      ":prenom_adh"=>$adherent->getPrenom_adh(),
      ":sexe_adh"=>$adherent->getSexe_adh(),
      ":date_naissance_adh"=>$adherent->getDate_naissance_adh(),
      ":adresse_adh"=>$adherent->getAdresse_adh(),
      ":cp_adh"=>$adherent->getCp_adh(),
      ":ville_adh"=>$adherent->getVille_adh(),
      ":mail_inscrit"=>$adherent->getMail_inscrit(),
      ":mdp_inscrit"=>$adherent->getMdp_inscrit(),
      ":id_club"=>$adherent->getId_club(),
      ":id_resp_leg"=>$id_resp_leg
    );
    $sth = $this->executer($sql, $params);
    $nb = $sth->rowcount();
    return $nb;  // Retourne le nombre de mise à jour
  }

  
}

// Classe AdherentDAO
