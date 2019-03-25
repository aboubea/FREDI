<?php
include 'head.php';
include 'init.php';
session_start();

if(isset($_SESSION['mail_resp_leg'])){
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
                <h1 class="header-headline bold">Gestion Frais </h1>
                <h4 class="header-running-text light">Licencié : <?php echo $adherent->getPrenom_adh() . ' ' . $adherent->getNom_adh() ;?></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Gestion des frais du licencié</h2>

<div class="row">
        <div class="col-xs-12">

<br />
<?php
if (count($notes) !== 0){
    echo "<table align='center'>";
    echo '<tr>';
    echo '<th>Année</th>';
    echo '<th>Bordereau validé ?</th>';
    echo '<th>Visualiser les frais</th>';
    echo '<th>Ajouter des frais</th>';
    echo '</tr>';

    foreach ($notes as $note) {
      echo '<tr>';
      echo '<td>'.$note->getannee().'</td>';
      $validate = $note->getis_validate();
      if ($validate == 0)
      {
          echo '<td>Non</td>';
          echo '<td><a href="lire_ligne.php?id_note_frais='.$note->getid_note_frais().'&licence_adh='. $adherent->getLicence_adh() .'">Visualiser</a></td>';
          echo '<td><a href="insertion_ligne.php?id_note_frais='.$note->getid_note_frais().'&licence_adh='. $adherent->getLicence_adh() .'">Ajouter</a></td>';

      } else {
          echo '<td>Oui</td>';
          echo '<td>validé</td>';
          echo '<td><a href="lire_ligne.php?id_note_frais='.$note->getid_note_frais().'&licence_adh='. $adherent->getLicence_adh() .'">Visualiser</a></td>';
      }

    }
    echo '</table>';
}

?>

<br />

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
