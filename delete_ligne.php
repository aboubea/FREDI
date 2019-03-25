<?php
include 'head.php';
include 'init.php';
session_start();

if (isset($_SESSION['mail_inscrit'])) {
    // Si l'adhérent MAJEUR est connecté, on récupère son mail stocké en SESSION lors de la connexion
    $mail_inscrit = $_SESSION['mail_inscrit'];
  
    // Et les infos de l'adherent majeur dans $adherent (tableau objet) et notamment sa licence
    $adherentDAO = new AdherentDAO();
    $adherent= $adherentDAO->findByMail($mail_inscrit);
    $licence_adh = $adherent->getLicence_adh();
  
  }elseif(isset($_SESSION['mail_resp_leg'])){
    // Si le responsable est connecté, on récupère son ID stocké en SESSION lors de la connexion
    $id_resp_leg = $_SESSION['id_resp_leg'];
  
    // Et les infos de l'adherent mineur dans $adherent (tableau objet) et notamment sa licence (via le lien => GET)
    $adherentDAO = new AdherentDAO();
    $licence_adh = isset($_GET['licence_adh']) ? $_GET['licence_adh'] : "";
    $adherent= $adherentDAO->find($licence_adh);
  }else{
    // Sinon on redirige vers la page d'accueil avec un message d'erreur
    header('Location:index.php?private=1');
  }

// Préparation des méthode DAO pour la suppression de la ligne de frais
$lignefraisDAO = new LignefraisDAO;
$id_ligne_frais = $_GET['id_ligne_frais'];
$nb = $lignefraisDAO->delete($id_ligne_frais);

header ('Location: lire_ligne.php?ligne_delete=1&id_note_frais='.$id_note_frais.'&licence_adh='. $adherent->getLicence_adh() .'');
exit;
?>