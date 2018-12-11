<?php
include 'head.php';
include 'init.php';

//On démarre la session
session_start();

//On récupère le mail du responsable legal (pour trouver ses details personnels), si il n'y est pas, on a pas accès à la page
if (isset($_SESSION['mail_resp_leg'])) {
    $mail_resp_leg = $_SESSION['mail_resp_leg'];
}else{
  header('Location:index.php?private=1');
}

$responsable_legalDAO = new Responsable_legalDAO();
$responsable_legal= $responsable_legalDAO->findByMail($mail_resp_leg);

//ID du responsable legal
$id_resp_leg = $responsable_legal->getId_resp_leg();

?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Espace Responsable<br />Légal</h1>
                <h4 class="header-running-text light"><?php echo "Bienvenue ". $responsable_legal->getPrenom_resp_leg() . " ". $responsable_legal->getNom_resp_leg() . "";?> ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Espace Personnel</h2>

<!-- INFORMATIONS PERSONNELLES ------------------------------------------------------------------------------------------------ -->

<div class="row"><!-- row -->
        <div class="col-xs-12"><!-- col-xs-12 -->
          <h3>Mes informations</h3>
          
          <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Rue</th>
                <th>Code Postal</th>
                <th>Ville</th>
            </tr>
<?php
  echo '<tr>';
  echo '<td>'.$responsable_legal->getNom_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getPrenom_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getRue_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getCp_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getVille_resp_leg().'</td>';
  echo '</tr>';
?>
</table>
<br />
<p class="text-danger">Pour accéder à toutes vos informations personnelles, cliquez sur "Visualiser".</p>
          <p><a class="btn btn-primary" href="data_rl.php" role="button">Visualiser</a></p>
        </div>
</div>

<!-- FIN INFORMATIONS PERSONNELLES ---------------------------------------------------------------------------------------------- -->

<!-- LISTES DES ADHERENTS MINEURS ----------------------------------------------------------------------------------------------- -->

<div class="row"><!-- row -->
        <div class="col-xs-12"><!-- col-xs-12 -->

          <h3>Adhérent(s) mineur(s)</h3>

          <?php
          if(isset($_GET["inscrit"])){
            echo '<p align"center"><strong>Le licencié mineur à votre charge à bien été enregistré.</strong></p>';
          }

          //On prépare les mathodes DAO de Adhérent (car on doit retourner la liste des adhérents mineur inscrits par le responsable legal)
          $adherentDAO = new AdherentDAO();

          //On récupère la liste des ADHERENTS mineurs inscrits par le responsable legal
          $adherents_resp_leg = $adherentDAO->findAllByIdRespLeg($id_resp_leg);

          //Si des adhérents ont été ajoutés par le responsable légal, on les affichent
            if ($adherents_resp_leg ==!null) {
                ?>
          
<!-- Affichage des adhérents mineurs --------------------------------------------------------------------------------------------- -->
          <table>
            <tr>
                <th>Licence</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Bordereaux</th>
            </tr>
            <?php
              foreach ($adherents_resp_leg as $adherent) {
                  $licence = $adherent->getLicence_adh();
                  echo '<tr>';
                  echo '<td>'.$adherent->getLicence_adh().'</td>';
                  echo '<td>'.$adherent->getNom_adh().'</td>';
                  echo '<td>'.$adherent->getPrenom_adh().'</td>';
                  echo '<td><p><a class="btn btn-primary" href="bordereaux?licence='. $licence .'.php" role="button">Accéder aux bordereaux</a></p></td>';
                  echo '</tr>';
              } ?>
          </table>

          <?php
            }else{
              echo '<p>Vous n\'avez pas encore inscrit d\'adhérents mineurs.</p>';
            }
          ?>
<!-- Fin d'affichage des adhérents mineurs -------------------------------------------------------------------------------------- -->

<br />
          <p class="text-danger">Pour inscrire un nouvel adhérent mineur à votre charge, cliquez sur "Ajouter un adhérent mineur".</p>
          <p><a class="btn btn-primary" href="register_adh_mineur.php" role="button">Ajouter un adhérent mineur</a></p>
        </div><!-- /col-xs-12 -->
</div> <!-- /row -->

<!-- FIN BASE ------------------------------------------------------------------------------------------------------------------ -->
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