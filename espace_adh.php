<?php
include 'head.php';
include 'init.php';
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
                <h1 class="header-headline bold">Espace Adhérent </h1>
                <h4 class="header-running-text light"><?php echo "Test" ;?> ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Espace Adhérent</h2>

<div class="row"> 
        <div class="col-xs-12">
          <h2>Mes informations</h2>
          
          <table>
            <tr>
                <th>Licence</th>
                <th>Nom</th>
                <th>Prenom</th>
            </tr>
<?php
  echo '<tr>';
  echo '<td>'.$adherent->getLicence_adh().'</td>';
  echo '<td>'.$adherent->getPrenom_adh().'</td>';
  echo '<td>'.$adherent->getNom_adh().'</td>';
  echo '</tr>';
?>
</table>
<br />
          <p class="text-danger">Pour modifier vos informations personnelles, cliquez sur "Modifier".</p>
          <p><a class="btn btn-primary" href="modif_adh.php" role="button">Modifier</a></p>
        </div>
</div>

<div class="row">
        <div class="col-xs-12">
          <h2>Mes bordereaux</h2>
          <p>Pour modifier votre bordereau, cliquez sur "Modifier".</p>
          <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
       </div>
</div>


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