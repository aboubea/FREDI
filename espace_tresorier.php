<?php
include 'head.php';
include 'init.php';

//On démarre la session
session_start();

//On récupère le mail de l'adhérent (pour trouver ses details personnels)
if (isset($_SESSION['mail_tresorier'])) {
  $mail_inscrit = $_SESSION['mail_tresorier'];
}else{
header('Location:index.php?private=1');
}
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
                <h1 class="header-headline bold">Espace Trésorier </h1>
                <h4 class="header-running-text light"><?php echo "Test" ;?> ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Espace Trésorier</h2>

<div class="row"> 
        <div class="col-xs-12">
          <h3>Mes informations</h3>
          
          <table align='center'>
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
          <p class="text-danger">Pour accéder à vos informations personnelles, cliquez sur "Visualiser".</p>
          <p align='center'><a class="btn btn-primary" href="data.php" role="button">Visualiser</a></p>
        </div>
</div>

<div class="row">
        <div class="col-xs-12">
          <h2>Editer les bordereaux</h2>
          <p>Pour valider ou éditer de(s) bordereau(x), cliquez sur <strong>"Borderaux"</strong>.</p>
          <p align='center'><a class="btn btn-primary" href="list_borderaux.php" role="button">Borderaux »</a></p>
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