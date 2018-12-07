<?php
include 'head.php'; //OBLIGATOIRE (En-tête -> CSS, Javascript...)
include 'init.php';
?>

<html>
<body>

<?php include 'menu3.php' ; //OBLIGATOIRE (Menu -> Navigation) ?>

        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">DEVELOPEURS</h1>
                <h4 class="header-running-text light">- Yann Dorego</h4>
                <h4 class="header-running-text light">- Antoine Boube-Astugue</h4>
                <h4 class="header-running-text light">- Antoine Bellino</h4>
                <h4 class="header-running-text light">- Paco Barbé</h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<h2 align="center">Bienvenue sur notre site <?php echo APPLINAME?> !</h2>

<p align="center">Bienvenue sur ce site qui correspond au projet du groupe 1 SIO 18/19</p>
<br>
<p align="center">Vous êtes adhérents, cliquez <a href="page1.php">ici</a></p>
<p align="center">Vous êtes trésorier, cliquez <a href="page2.php">ici</a></p>
<p align="center">Vous êtes membre du CRIB, cliquez <a href="page3.php">ici</a></p>
<br />
<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a> | <a href="register_adh.php">Pas encore inscrit ?</a> | <a href="insertion_ligne.php">entrez ligne de frais ?</a></p>


<!-- FIN BASE ---------------------------------------------------------------------------------------------------------------- -->
            </div>
        </div><!--hero-->
    </div> <!-- hero-container -->
</div><!--hero-background-->

<?php
include 'logo.php';

include 'team.php';
include 'footer.php';//OBLIGATOIRE (Pied de page -> script js...)
?>

</body>
</html>
