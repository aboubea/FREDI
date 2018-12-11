<?php
include 'head.php';
include 'init.php';
session_start();

//On récupère le mail du responsable legal (pour trouver ses details personnels), si il n'y est pas, on a pas accès à la page
if (isset($_SESSION['mail_resp_leg'])) {
    $mail_resp_leg = $_SESSION['mail_resp_leg'];
}else{
  header('Location:index.php?private=1');
}

$responsable_legalDAO = new Responsable_legalDAO();
$responsable_legal= $responsable_legalDAO->findByMail($mail_resp_leg);
?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Vos infos</h1>
                <h4 class="header-running-text light"><?php echo $responsable_legal->getPrenom_resp_leg() . ' ' . $responsable_legal->getNom_resp_leg() ;?></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Espace Responsable Legal</h2>

<div class="row"> 
        <div class="col-xs-12">
          <h2><a href = "data.php">Mes informations</a></h2>
          
          <table align='center'r>
            <tr>
                <th>ID</th>
                <th>Nom </th>
                <th>Prenom</th>
                <th>Adresse Mail</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Code Postal</th>
            </tr>
<?php
  echo '<tr>';
  echo '<td>'.$responsable_legal->getId_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getNom_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getPrenom_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getMail_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getRue_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getVille_resp_leg().'</td>';
  echo '<td>'.$responsable_legal->getCp_resp_leg().'</td>';
  echo '</tr>';
?>
</table>
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