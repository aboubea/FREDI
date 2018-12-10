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
   * Lecture d'un responsable legal par son EMAIL
   *
   * @param type $mail_resp_leg
   * @return \Responsable_legal
   */
  function findByMail($mail_resp_leg) {
    $sql = "select * from responsable_legal where mail_resp_leg=:mail_resp_leg";
    $params = array(
      ":mail_resp_leg" => $mail_resp_leg
    );
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
* Lecture de tous les adherent(s) mineur d'un responsable legal (retourne NULL si aucune données, sinon retourne UN ou PLUSIEURS tableaux objets)
* @param int $id_resp_leg l'ID du responsable legal
* @return array \Adherent
*/

function findAllByIdRespLeg($id_resp_leg) {
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
  * Vérifie si l'utilisateur est bien inscrit
  * @return array \Responsable_legal
  */
  function est_inscrit($mail_resp_leg, $mdp_resp_leg) {
    try {
    $sql = "select mail_resp_leg, mdp_resp_leg from responsable_legal where mail_resp_leg=:mail_resp_leg";
    $params = array(
      ":mail_resp_leg" => $mail_resp_leg
     );

    //On exécute la requête
    $sth = $this->executer($sql, $params);

    //On récupère le mail et le mot de passe présent dans la BDD pour l'email saisit
    $row = $sth->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    
    // On vérifie le mot de passe (celui rentré dans le formulaire et celui présent da la base de données)
    if (password_verify($mdp_resp_leg, $row['mdp_resp_leg'])){
      return true ;
    } else {
      return false ;
    }
  }

  function is_bug($mail_resp_leg, $mdp_resp_leg) {
    try {
    $sql = "select mail_resp_leg, mdp_resp_leg from responsable_legal where mail_resp_leg=:mail_resp_leg";
    $params = array(
      ":mail_resp_leg" => $mail_resp_leg
     );

    //On exécute la requête
    $sth = $this->executer($sql, $params);

    //On récupère le mail et le mot de passe présent dans la BDD pour l'email saisit
    $row = $sth->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    
    // On vérifie le mot de passe (celui rentré dans le formulaire et celui présent da la base de données)
    if ($row){
    echo '<br />';
    echo $row['mdp_resp_leg'];
    echo '<br />';
    echo $row['mail_resp_leg'];
    echo '<br />';
    } else {
      echo 'BUG';
    }
  }

  /**
   * Ajoute un responsable legal
   *
   * @return int nb de mises à jour
   */
  function insert($responsable_legal) {
    $sql = "insert into responsable_legal (nom_resp_leg, prenom_resp_leg, rue_resp_leg, cp_resp_leg, ville_resp_leg, mail_resp_leg, mdp_resp_leg) values (:nom_resp_leg, :prenom_resp_leg, :rue_resp_leg, :cp_resp_leg, :ville_resp_leg, :mail_resp_leg, :mdp_resp_leg)";
    $params = array(
        ":nom_resp_leg" => $responsable_legal->getNom_resp_leg(),
        ":prenom_resp_leg" => $responsable_legal->getPrenom_resp_leg(),
        ":rue_resp_leg" => $responsable_legal->getRue_resp_leg(),
        ":cp_resp_leg" => $responsable_legal->getCp_resp_leg(),
        ":ville_resp_leg" => $responsable_legal->getVille_resp_leg(),
        ":mail_resp_leg" => $responsable_legal->getMail_resp_leg(),
        ":mdp_resp_leg" => $responsable_legal->getMdp_resp_leg()
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
    $sql = "update responsable_legal set nom_resp_leg=:nom_resp_leg, prenom_resp_leg=:prenom_resp_leg, rue_resp_leg=: rue_resp_leg, cp_resp_leg=:cp_resp_leg, ville_resp_leg=:ville_resp_leg, mail_resp_leg=:mail_resp_leg, mdp_resp_leg=:mdp_resp_leg)";
    $params = array(
        ":nom_resp_leg" => $responsable_legal->getNom_resp_leg(),
        ":prenom_resp_leg" => $responsable_legal->getPrenom_resp_leg(),
        ":rue_resp_leg" => $responsable_legal->getRue_resp_leg(),
        ":cp_resp_leg" => $responsable_legal->getCp_resp_leg(),
        ":ville_resp_leg" => $responsable_legal->getVille_resp_leg(),
        ":mail_resp_leg" => $responsable_legal->getMail_resp_leg(),
        ":mdp_resp_leg" => $responsable_legal->geMdp_resp_leg()
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
