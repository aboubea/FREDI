<?php
include 'head.php';
include 'init.php';
// Récupère la liste des Clubs (liste déroulante) et les Adhérents présents (pour ne pas rentrer un email déjà présent)
$lignefraisDAO = new LignefraisDAO;
$id_note_frais = $_GET['id_note_frais'];
$lignes = $lignefraisDAO->find($id_note_frais);
$notefraisDAO = new NotefraisDAO;
$notefrais = $notefraisDAO->findAll();


session_start();
$mail_inscrit = $_SESSION['mail_inscrit'];
$adherentDAO = new AdherentDAO();
$adherent= $adherentDAO->findByMail($mail_inscrit);
?>
<html>
<body>

<?php include 'menu3.php' ; ?>

<!-- Hero-Section
  ================================================== -->
  <div class="hero row">
      <div class="hero-right col-sm-6 col-sm-6">
          <h1 class="header-headline bold">Vos frais<br></h1>
          <h4 class="header-running-text light">Licencié : <?php echo $adherent->getPrenom_adh() . ' ' . $adherent->getNom_adh() ;?></h4>
          </div><!--hero-left-->
          <div class="base">


<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<div class="row"> 
        <div class="col-xs-12">
          <h3 align='center'>Lignes de frais du bordereau :</h3>
          
<br />
  <?php
    if (isset($_GET["ligne_ajoutee"])){
      echo '<p align="center"><strong>Vos frais ont bien été ajoutés !</strong></p>';
    }

    if (count($lignes) !== 0){
        echo "<table align='center'>";
        echo '<tr>';
        echo '<th>Date</th>';
        echo '<th>Libellé du Trajet</th>';
        echo '<th>Nombre de KM</th>';
        echo '<th>Cout peage</th>';
        echo '<th>Cout repas</th>';
        echo '<th>Cout hebergement</th>';
        echo '<th>Modifier</th>';
        echo '<th>Supprimer</th>';
        echo '</tr>';
        
        foreach ($lignes as $ligne) {
          echo '<tr>';
          echo '<td>'. $ligne->getdate_frais() .'</td>';
          echo '<td>'. $ligne->gettrajet_frais() .'</td>';
          echo '<td>'. $ligne->getkm_parcourus() .'</td>';
          echo '<td>'. $ligne->getcout_peage() .'</td>';
          echo '<td>'. $ligne->getcout_repas() .'</td>';
          echo '<td>'. $ligne->getcout_hebergement() .'</td>';
          echo '<td><a href="modif_ligne.php?id_ligne_frais='.$ligne->getid_ligne_frais().'">Modifier</a></p></td>';
          echo '<td><a href="delete_ligne.php?id_ligne_frais='.$ligne->getid_ligne_frais().'">Supprimer</a></p></td>';
          echo '</tr>';
          
        }
        echo '</table>';
    } else {
      echo '<p align="center">Vous n\'avez pas encore saisie vos lignes de frais.</p>';
      echo '<p align="center"><a class="btn btn-primary" href="insertion_ligne.php?id_note_frais='.$id_note_frais.'" role="button">Ajouter une première ligne de frais »</a></p>';
    }
        
          
  ?>
  </br>
<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a></p>
