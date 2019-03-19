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
                <h1 class="header-headline bold">Edition du tarif </h1>
                <h4 class="header-running-text light"> Trésorier : <?php echo $tresorier->getprenom_tresorier() . ' ' . $tresorier->getnom_tresorier() ;?> ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Espace Trésorier</h2>

<div class="row"> 
        <div class="col-xs-12">
          <h3>Editer le tarif kilométrique</h3>

          <?php 
          if(isset($_GET["success"])){
            echo '<p align"center"><strong>Le tarif kilométrique a été ajouté.</strong></p>';
          }

          //On prépare les mathodes DAO
          $indemniteDAO = new IndemniteDAO();

          //On récupère l'indemnité de l'annee
          $indemnite = $indemniteDAO->findIndemnite();

          //Si l'indemnité est présente dans la BDD
            if ($indemnite->getannee() ==! null) {
              var_dump($indemnite);
                ?>

            <table align='center'>
                <tr>
                    <th>Annee</th>
                    <th>Tarif Kilométrique</th>
                </tr>
                    <?php
                        echo '<tr>';
                        echo '<td>'.$indemnite->getannee().'</td>';
                        echo '<td>'.$indemnite->gettarif_kilometrique().'</td>';
                        echo '</tr>';
                    ?>
            </table>

          <?php
            }else{
              var_dump($indemnite);
              $annee = date('Y');
              echo '<p>Vous n\'avez pas encore fixer de tarif kilométrique ! Veuillez fixer un tarif kilométrique pour l\'année '.$annee.'.</p>';
              echo '<p>Pour modifier le tarif kilométrique, cliquez sur <strong>"Fixer un tarif"</strong>.</p>';
              echo '<p align="center"><a class="btn btn-primary" href="create_tarif_km.php" role="button">Fixer un tarif »</a></p>';
            }
          ?>

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