<?php

/**
 * Classe d'authentification et d'autorisation
 *
 * @author jef
 */
require_once SRC . DS . 'DAO' . DS . 'AdherentDAO.php';
require_once SRC . DS . 'models' . DS . 'Adherent.php';

class Auth {

  static $adherentDAO; // Le DAO pour accéder à la table SQL

  /**
   * Pseudo constructeur (voir tout en bas)
   */

  static function init() {
    self::$adherentDAO = new AdherentDAO();
  }

  /**
   * Inscrit un adherent
   * @param type $adherent
   * @return boolean true si l'adherent est inscrit, false sinon
   */
  static function inscrire(adherent $adherent) {
    // Hachage du mot de passe
    $adherent->set_password(password_hash($adherent->get_password(), PASSWORD_BCRYPT));
    self::$adherentDAO->insert($adherent);
    return true;
  }

  /**
   * Authentifie un adherent
   * @param type $p_adherent
   */
  static function connecter(utilisateur $p_adherent) {
    $ok = true;
    // Cherche l'adherent dans la base
    $adherents = self::$utilisateurDAO->findAllByLogin($p_utilisateur->get_login());
    $adherent = new Adherent();
    if (count($adherents) == 1) {
      // Adherent identifié
      $adherent = $adherents[0];
    }
    // Vérifie le password haché
    if (password_verify($p_adherent->get_password(), $adherent->get_password())) {
      // Utilisateur authentifié
      self::memoriser($utilisateur); // Mémorisation dans la session
      $ok = true;
    } else {
      // Utilisateur non authentifié
      $ok = false;
    }
    return $ok;
  }

  /**
   * Déconnecte l'adherent
   * TODO : ne pas détruire la session complétement car on perd aussi les messages flash !
   * TODO : cette méthode n'appelle pas la méthode "logout" définie plus bas
   */
  static function deconnecter() {
    session_unset(); // Détruit la variable de session
    session_destroy(); // Détruit la session
    setcookie(session_name(), '', -1, '/'); // Détruit le cookie de session
    return true;
  }

  /**
   * Retourne le login de l'adherent connecté
   * @return string
   */
  static function get_login() {
    if (isset($_SESSION['adherent'])) {
      $adherent = $_SESSION['adherent'];
      $login = $adherent->get_login();
    } else {
      $login = "inconnu";
    }
    return $login;
  }

  /**
   * Retourne l'objet de l'adherent connecté
   * @return string
   */
  static function get_user() {
    if (isset($_SESSION['adherent'])) {
      $adherent = $_SESSION['adherent'];
    } else {
      $adherent = NULL;
    }
    return $adherent;
  }

  /**
   * Détermine si l'adherent est authentifié ou pas
   * @param type $login
   * @return boolean true si si l'adherent est authentifié, false sinon
   */
  static function est_authentifie() {
    $reponse = false;
    if (isset($_SESSION['adherent'])) {
      $reponse = true;
    } else {
      Flash::add('Vous devez vous connecter pour accéder à cette page', 3);
    }
    return $reponse;
  }

  /**
   * Mémorise en session l'objet correspondant à l'adherent connecté
   * @param adherent $adherent
   */
  static function memoriser(adherent $adherent) {
    $_SESSION['adherent'] = $adherent;  // Sauvegarde en session
  }

  /**
   * Supprime de la session l'objet correspondant à l'adherent connecté
   * @param adherent $adherent
   */
  static function effacer(utilisateur $adherent) {
    unset($_SESSION['adherent']);
  }

}

// class Auth
// Simule un constructeur (Les constructeurs ne marchent pas avec les classes statiques)
Auth::init();
