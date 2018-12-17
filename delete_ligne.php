<?php
include 'head.php';
include 'init.php';


$lignefraisDAO = new LignefraisDAO;
$lignefrais = $lignefraisDAO->findAll();
$id_ligne_frais = $_GET['id_ligne_frais'];

session_start();
$mail_inscrit = $_SESSION['mail_inscrit'];
$adherentDAO = new AdherentDAO();
$adherent= $adherentDAO->findByMail($mail_inscrit);


$nb = $lignefraisDAO->delete($id_ligne_frais);





header ('Location: list_borderaux.php');
exit;
?>