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

$indemniteDAO = new IndemniteDAO;

$annee = isset($_GET['annee']) ? $_GET['annee'] : $_POST['annee'] ;
$indemnite = $indemniteDAO->findIndemnite($annee);

?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Edition du tarif </h1>
                <h4 class="header-running-text light"> Trésorier : <?php echo $tresorier->getprenom_tresorier() . ' ' . $tresorier->getnom_tresorier() ; ?> ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE --------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Edition du tarif kilométrique</h2>

<?php

$submit = isset($_POST['submit']);

if($submit){
    $annee = isset($_POST['annee']) ? $_POST['annee'] : $_POST['annee'] ;
    $tarif_kilometrique = isset($_POST['tarif_kilometrique']) ? $_POST['tarif_kilometrique'] : "";

    $indemnite =  new Indemnite(array(
      ":annee" => $annee,
      ":tarif_kilometrique" => $tarif_kilometrique,
    ));

    // Met à jour à l'enregistrement dans la BDD
    $nb = $indemniteDAO->updateTarif($indemnite);

        header('Location: see_tarif_km.php?success=success');

        // Obligatoire sinon PHP continue à exécuter le script
        exit;  
} 

// Ajout du formulaire d'inscription
    include 'forms/Tresorier_modifier_tarif_km.php';
?>

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