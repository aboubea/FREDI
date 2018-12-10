<?php
include 'head.php';
include 'init.php';
session_start();
$mail_inscrit = $_SESSION['mail_inscrit'];
$adherentDAO = new AdherentDAO();
$adherent= $adherentDAO->findByMail($mail_inscrit);


$licence_adh = $adherent->getLicence_adh();

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
                <h1 class="header-headline bold">Espace Adhérent </h1>
                <h4 class="header-running-text light"><?php echo "Test" ;?> ></h4>
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
    echo '<th>ID</th>';
    echo '<th>Année</th>';
    echo '<th>Is_Validate?</th>';
    echo '<th>Visualiser</th>';
    echo '<th>Ajouter ligne de frais</th>';
    echo '</tr>';
    
    foreach ($notes as $note) {
      echo '<tr>';
      echo '<td>'.$note->getid_note_frais().'</td>';
      echo '<td>'.$note->getannee().'</td>';
      $validate = $note->getis_validate();
      if ($validate == 0)
      {
          echo '<td>Non</td>';
      } else {
          echo '<td>Oui</td>';
      }
      echo '<td><a href="lire_ligne.php?id_note_frais='.$note->getid_note_frais().'">Visualiser</a></td>';
      echo '<td><a href="insertion_ligne.php?id_note_frais='.$note->getid_note_frais().'">Ajouter</a></td>';
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