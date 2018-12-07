<?php
include 'head.php';
include 'init.php';
// Récupère la liste des Clubs (liste déroulante) et les Adhérents présents (pour ne pas rentrer un email déjà présent)
$lignefraisDAO = new LignefraisDAO;
$motifDAO = new MotifDAO();
$motifs = $motifDAO->findAll();//liste des motifs
//$ligueDAO = new ligueDAO();
?>
<html>
<body>

<?php include 'menu3.php' ; ?>

<!-- Hero-Section
  ================================================== -->
  <div class="hero row">
      <div class="hero-right col-sm-6 col-sm-6">
          <h1 class="header-headline bold">Adhérent<br></h1>
          <h4 class="header-running-text light"> Inscrivez-vous ></h4>
          </div><!--hero-left-->
          <div class="base">


<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->


  <?php

  $submit = isset($_POST['submit']);

  if($submit){
      $date_frais = isset($_POST['date_frais']) ? $_POST['date_frais'] : "";
      $km_parcourus = isset($_POST['km_parcourus']) ? $_POST['km_parcourus'] : "";
      $trajet_frais = isset($_POST['trajet_frais']) ? $_POST['trajet_frais'] : "";
      $cout_peage = isset($_POST['cout_peage']) ? $_POST['cout_peage'] : "";
      $cout_repas = isset($_POST['cout_repas']) ? $_POST['cout_repas'] : "";
      $cout_hebergement = isset($_POST['cout_hebergement']) ? $_POST['cout_hebergement'] : "";
      $id_motif = isset($_POST['Id_motif']) ? $_POST['Id_motif'] : "";

      $lignefrais =  new lignefrais(array(
        ":date_frais" => $date_frais,
        ":trajet_frais" => $trajet_frais,
        ":km_parcourus" =>  $km_parcourus,
        ":cout_peage" => $cout_peage,
        ":cout_repas" => $cout_repas,
        ":cout_hebergement" => $cout_hebergement,
        ":Id_motif" => $id_motif
      ));
          // Ajoute l'enregistrement dans la BDD
          $nb = $lignefraisDAO->insert($date_frais,$trajet_frais,$km_parcourus,$cout_peage,$cout_repas,$cout_hebergement,$id_motif);
          //header('Location: connexion_adh.php?inscrit=1&mail='.$mail_inscrit.'');
          exit;  // Obligatoire sinon PHP continue à exécuter le script

  } else {
      //$erreur = "<p align='center'><strong>Vous n'avez pas saisis toutes les informations ! Veuillez remplir tous les champs svp.</strong></p>";
  }

  // Ajout du formulaire d'inscription
      include 'forms/ADH_insertion_ligne_Form.php';
  ?>
