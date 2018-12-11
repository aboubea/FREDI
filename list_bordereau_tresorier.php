<?php
include 'head.php';
include 'init.php';

//On démarre la session
session_start();

//On récupère le mail de l'adhérent (pour trouver ses details personnels)
if (isset($_SESSION['mail_tresorier'])) {
  $mail_tresorier = $_SESSION['mail_tresorier'];
}else{
header('Location:index.php?private=1');
}
$tresorierDAO = new TresorierDAO();
$tresorier= $tresorierDAO->findByMail($mail_tresorier);

$id_club = $tresorier->getid_club();

$notefraisDAO = new NotefraisDAO();
$notes= $tresorierDAO->find_notes($id_club);
?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Liste des Bordereaux : </h1>
                <h4 class="header-running-text light">Trésorier : <?php echo $tresorier->getprenom_tresorier() . ' ' . $tresorier->getnom_tresorier() ;?></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Bordereaux associés à votre Club : </h2>

<div class="row"> 
        <div class="col-xs-12">
          <h3 align='center'>Sélectionner un borderau : </h3>
          
<br />
<?php
if (count($notes) !== 0){
    echo "<table align='center'>";
    echo '<tr>';
    echo '<th>Année</th>';
    echo '<th>Validé</th>';
    echo '<th>Visualiser les frais</th>';
    echo '<th>Is Validé?</th>';
    echo '<th>Exemplaire en PDF</th>';
    echo '</tr>';
    
    foreach ($notes as $note) {
      echo '<tr>';
      echo '<td>'.$note->getannee().'</td>';
      $validate = $note->getis_validate();
      if ($validate == 0)
      {
          echo '<td>Non</td>';
      } else {
          echo '<td>Oui</td>';
      }
      echo '<td><a href="lire_ligne.php?id_note_frais='.$note->getid_note_frais().'">Visualiser</a></td>';
      if ($validate == 0)
      {
          echo '<td><a href = "valider_tresorier.php?id_note_frais='.$note->getid_note_frais().'">Valider</a></td>';
      } else {
          echo '<td><a href = "unvalidate_tresorier.php?id_note_frais='.$note->getid_note_frais().'">Dé-Valider</a></td>';
      }
      echo '<td><a href="">Lien en PDF</a></td>';
      echo '</tr>';
      
    }
    echo '</table>';
} else {
    echo 'Aucune ligne de frais saisies';
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