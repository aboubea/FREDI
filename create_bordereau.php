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
          <h4 align='center'>Vous avez créer votre premier bordereau, cliquez ci-dessous pour le visualiser ou l'éditer : </h4>
          <p align = 'center'><a class="btn btn-primary" href="list_borderaux.php" role="button">Voir mes borderaux »</a></p>

<br />
<?php
 $licence_adh = $adherent->getLicence_adh();
          $nb1 = $notefraisDAO->insert($licence_adh);
?>

<p>Revenir à la page d'<a href="index.php">accueil</a></p>


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