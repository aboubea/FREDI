<?php
include 'head.php';
include 'init.php';
?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Adhérent</h1>
                <h4 class="header-running-text light"> Connectez-vous ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'> Espace Adhérent </h2>

<?php
session_start();
$mail_inscrit = $_SESSION['mail_inscrit'];
echo $mail_inscrit;
?>

<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a> | <a href="register_adh.php">Pas encore inscrit ?</a></p>


<!-- FIN BASE ---------------------------------------------------------------------------------------------------------------- -->
            </div>
        </div><!--hero-->
        
        <!-- Message d'information en cas d'inscription réussite -->
        <?php 
        if (isset($_GET['inscrit']) ? $_GET['inscrit'] : NULL) {
            $mail = $_GET["mail"];
            //On execute le code qui suit en HTML/CSS/JS sans fermet l'accolade 
        ?>

        <div class="alert alert-info">
            <a href="mailto:<?php echo $mail ; ?>" class="btn btn-xs btn-primary pull-right">Vérifier ma boîte mail</a>
            <strong>Un mail de validation a été envoyé à votre adresse : <a href="mailto:<?php echo $mail ; ?>"><?php echo $mail ; ?></a></strong> <i class="far fa-envelope"></i>.<br />
            <strong>Pensez à consulter votre boîte mail afin de confirmer votre compte.</strong>
        </div>

        <?php
            } //On ferme l'accolade
        ?>

    </div> <!-- hero-container -->
</div><!--hero-background-->

<?php
include 'logo.php';
include 'team.php';
include 'footer.php';
?>

</body>
</html>