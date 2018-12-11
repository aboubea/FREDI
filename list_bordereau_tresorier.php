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

$id_note_frais = $tresorier->getid_note_frais();

$notefraisDAO = new NotefraisDAO();
$notes= $tresorierDAO->find_notes($id_note_frais);
?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Liste des Bordereaux : </h1>
                <h4 class="header-running-text light">Trésorier : <?php echo $adherent->getPrenom_adh() . ' ' . $adherent->getNom_adh() ;?></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Bordereaux associés à votre Club : </h2>

<div class="row"> 
        <div class="col-xs-12">
          <h3 align='center'>Sélectionner un borderau pour le visualiser : </h3>
          
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
      } else {
          echo '<td>Oui</td>';
      }
      echo '<td><a href="lire_ligne.php?id_note_frais='.$note->getid_note_frais().'">Visualiser</a></td>';
      echo '<td><a href="insertion_ligne.php?id_note_frais='.$note->getid_note_frais().'">Ajouter</a></td>';
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