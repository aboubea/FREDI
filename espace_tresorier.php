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
?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Espace Trésorier </h1>
                <h4 class="header-running-text light">Trésorier : <?php echo $tresorier->getprenom_tresorier() . ' ' . $tresorier->getnom_tresorier() ;?> ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Espace Trésorier</h2>

<div class="row"> 
        <div class="col-xs-12">
          <h3>Mes informations</h3>
          
          <table align='center'>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse Mail</th>
            </tr>
<?php
  echo '<tr>';
  echo '<td>'.$tresorier->getid_tresorier().'</td>';
  echo '<td>'.$tresorier->getnom_tresorier().'</td>';
  echo '<td>'.$tresorier->getprenom_tresorier().'</td>';
  echo '<td>'.$tresorier->getmail_tresorier().'</td>';
  echo '</tr>';
?>
</table>
<br />
          <p class="text-danger">Pour accéder à vos informations personnelles, cliquez sur "Visualiser".</p>
          <p align='center'><a class="btn btn-primary" href="data_tresorier.php" role="button">Visualiser</a></p>
        </div>
</div>

<div class="row">
        <div class="col-xs-12">
          <h2>Editer les bordereaux</h2>
          <p>Pour valider ou éditer de(s) bordereau(x), cliquez sur <strong>"Borderaux"</strong>.</p>
          <p align='center'><a class="btn btn-primary" href="list_bordereau_tresorier.php" role="button">Borderaux »</a></p>
       </div>
</div>

<div class="row">
        <div class="col-xs-12">
          <h2>Modifier de tarif kilométrique de l'année en cours </h2>
          <p>Pour modifier le tarif kilométrique, cliquez sur <strong>"Tarif Kilométrique"</strong>.</p>
          <p align='center'><a class="btn btn-primary" href="see_tarif_km.php" role="button">Tarif Kilométrique »</a></p>
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