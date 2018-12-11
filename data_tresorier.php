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
                <h1 class="header-headline bold">Vos infos</h1>
                <h4 class="header-running-text light"><?php echo "Test" ;?> ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Espace Adhérent</h2>

<div class="row"> 
        <div class="col-xs-12">
          <h2><a href = "data.php">Mes informations</a></h2>
          
          <table align='center'r>
            <tr>
                <th>ID : </th>
                <th>Nom : </th>
                <th>Prenom : </th>
                <th>Adresse Mail : </th>
                <th>Adresse : </th>
                <th>ID Club : </th>
            </tr>
<?php
   echo '<tr>';
   echo '<td>'.$tresorier->getid_tresorier().'</td>';
   echo '<td>'.$tresorier->getnom_tresorier().'</td>';
   echo '<td>'.$tresorier->getprenom_tresorier().'</td>';
   echo '<td>'.$tresorier->getmail_tresorier().'</td>';
  echo '<td>'.$tresorier->getadresse().'</td>';
  echo '<td>'.$tresorier->getid_club().'</td>';

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