<?php

/**
 * Classe d'accès Responsable_legalDAO
 *
 * @author Paco
 */

class TresorierDAO extends DAO {

function est_tresorier($mail_tresorier, $mdp_tresorier) {
    try {
    $sql = "select mail_tresorier, mdp_tresorier from tresorier where mail_tresorier=:mail_tresorier";
    $params = array(
      ":mail_tresorier" => $mail_tresorier
     );

    //On exécute la requête
    $sth = $this->executer($sql, $params);

    //On récupère le mail et le mot de passe présent dans la BDD pour l'email saisit
    $row = $sth->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    
    // On vérifie le mot de passe (celui rentré dans le formulaire et celui présent da la base de données)
    if (password_verify($mdp_tresorier, $row['mdp_tresorier'])){
      return true ;
    } else {
      return false ;
    }
  }
}