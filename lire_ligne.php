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

// Récupération des lignes de frais associées à l'ID note frais (du bordereau)
$lignefraisDAO = new LignefraisDAO;
$id_note_frais = $_GET['id_note_frais'];
$lignes = $lignefraisDAO->find($id_note_frais);

?>
<html>
<body>

<?php include 'menu3.php' ; ?>

<!-- Hero-Section -->
  <div class="hero row">
      <div class="hero-right col-sm-6 col-sm-6">
          <h1 class="header-headline bold">Visualiation Frais<br></h1>
          <h4 class="header-running-text light">Licencié : <?php echo $adherent->getPrenom_adh() . ' ' . $adherent->getNom_adh() ;?></h4>
          </div><!--hero-left-->
          <div class="base">


<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<div class="row">
        <div class="col-xs-12">
          <h3 align='center'>Lignes de frais :</h3>

<br />
  <?php
    if (isset($_GET["ligne_ajoutee"])){
      echo '<p align="center"><strong>Votre frais a bien été ajouté !</strong></p>';
    }elseif(isset($_GET["ligne_delete"])){
      echo '<p align="center"><strong>Votre frais a bien été supprimé !</strong></p>';
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
        //echo '<th>Modifier</th>';
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
          //echo '<td><a href="modif_ligne.php?id_ligne_frais='.$ligne->getid_ligne_frais().'">Modifier</a></p></td>';
          echo '<td><a href="delete_ligne.php?id_ligne_frais='.$ligne->getid_ligne_frais().'&licence_adh='. $adherent->getLicence_adh() .'">Supprimer</a></p></td>';
          echo '</tr>';

        }
        echo '</table>';
    } else {
      echo '<p align="center">Vous n\'avez pas encore saisie vos lignes de frais.</p>';
      echo '<p align="center"><a class="btn btn-primary" href="insertion_ligne.php?id_note_frais='.$id_note_frais.'&licence_adh='. $adherent->getLicence_adh() .'" role="button">Ajouter une première ligne de frais »</a></p>';
    }


  ?>
  </br>
<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a></p>
