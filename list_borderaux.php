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
}else{
    // Sinon on redirige vers la page d'accueil avec un message d'erreur
    header('Location:index.php?private=1');
}

$notefraisDAO = new NotefraisDAO();
$notes= $notefraisDAO->findbylicence($licence_adh);
?>
<html>
<body>

<?php include 'menu3.php' ; ?>

        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Vos bordereaux </h1>
                <h4 class="header-running-text light">Licencié : <?php echo $adherent->getPrenom_adh() . ' ' . $adherent->getNom_adh() ;?></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Mes Borderaux</h2>

<div class="row">
        <div class="col-xs-12">
          <h3 align='center'>Sélectionner votre borderau pour le visualiser : </h3>

<br />
<?php
if (count($notes) !== 0){
    echo "<table align='center'>";
    echo '<tr>';
    echo '<th>Année</th>';
    echo '<th>Validé</th>';
    echo '<th>Visualiser vos frais</th>';
    echo '<th>Ajouter vos frais</th>';
    echo '<th>Exemplaire en PDF</th>';
    echo '</tr>';

    foreach ($notes as $note) {
      echo '<tr>';
      echo '<td>'.$note->getannee().'</td>';
      $validate = $note->getis_validate();
      if ($validate == 0)
      {
          echo '<td>Non</td>';
          echo '<td><a href="lire_ligne.php?id_note_frais='.$note->getid_note_frais().'">Visualiser</a></td>';
          echo '<td><a href="insertion_ligne.php?id_note_frais='.$note->getid_note_frais().'">Ajouter</a></td>';

      } else {
          echo '<td>Oui</td>';
          echo '<td>validé</td>';
          echo '<td><a href="lire_ligne.php?id_note_frais='.$note->getid_note_frais().'">Visualiser</a></td>';
      }


      if ($validate == 0)
      {
          echo '<td>En attente de validation par le trésorier</td>';
      } else {
          echo '<td>Lien en PDF</td>';
      }
      echo '</tr>';

    }
    echo '</table>';
} else {
    echo 'Voulez vous créer votre premier borderau ?';
    echo'</br>';echo'</br>';
    echo '<p><a class="btn btn-primary" href="create_bordereau.php" role="button">Créer un bordereau »</a></p>';
}

?>

</br>

        </div>
</div>
<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a></p>

<!-- FIN BASE ---------------------------------------------------------------------------------------------------------------- -->
            </div>
        </div><!--hero-->

    </div> <!-- hero-container -->
</div><!--hero-background-->

<?php
include 'logo.php';
include 'team.php';
include 'footer.php';
?>

</body>
</html>
