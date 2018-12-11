<?php

/**
 * Classe d'accès Responsable_legalDAO
 *
 * @author Paco
 */

class TresorierDAO extends DAO {

  function find_notes($id_note_frais){
    $sql = "select * from note_frais 
            where note_frais.id_note_frais = tresorier.id_note_frais 
            and tresorier.id_note_frais =:id_note_frais";
    $params = array(":id_note_frais" => $id_note_frais);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new lignefrais($row);
    }
    // Retourne un tableau d'objet métier
    return $tableau;
  }

  function findByMail($mail_tresorier) {
    $sql = "select * from tresorier where mail_tresorier=:mail_tresorier";
    $params = array(":mail_tresorier" => $mail_tresorier);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $tresorier = new Tresorier($row);
    } else {
      $tresorier = new Tresorier();
    }
    // Retourne l'objet métier
    return $tresorier;
  }

function est_tresorier($mail_tresorier, $mdp_tresorier) {
    try {
    $sql = "select mail_tresorier, mdp_tresorier from tresorier where mail_tresorier=:mail_tresorier";
    $params = array(":mail_tresorier" => $mail_tresorier);

    $sth = $this->executer($sql, $params);

    //On récupère le mail et le mot de passe présent dans la BDD pour l'email saisit
    $row = $sth->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    
    // On vérifie le mot de passe (celui rentré dans le formulaire et celui présent da la base de données)
    if ($mdp_tresorier == $row['mdp_tresorier']){
      return true ;
    } else {
      return false ;
    }
  }
}