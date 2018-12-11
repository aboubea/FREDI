<?php

/**
 * Classe d'accès Responsable_legalDAO
 *
 * @author Paco
 */

class TresorierDAO extends DAO {

  function find_notes($id_club){
    $sql = "select * 
            from note_frais 
            where id_club = :id_club";
    $params = array(":id_club" => $id_club);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new notefrais($row);
    }
    // Retourne un tableau d'objet métier
    return $tableau;
  }

  function validate($id_note_frais)
  {
    $sql = "update note_frais 
            set is_validate = 1  
            where id_note_frais = :id_note_frais";
              try {
                  $sth = $this->pdo->prepare($sql);
                  $sth->execute(array(":id_note_frais" => $id_note_frais));
              } catch (PDOException $e) {
                  throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
              }
              return 1;
  }

  function unvalidate($id_note_frais)
  {
    $sql = "update note_frais 
            set is_validate = 0  
            where id_note_frais = :id_note_frais";
              try {
                  $sth = $this->pdo->prepare($sql);
                  $sth->execute(array(":id_note_frais" => $id_note_frais));
              } catch (PDOException $e) {
                  throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
              }
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