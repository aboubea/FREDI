<?php
include 'head.php';
include 'init.php';

session_start();
include 'inc/user_restriction.php';

?>

<html>
<body>

<?php include 'menu3.php' ; ?>
        
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
<?php 
    if (isset($_GET['deconnexion'])){
        echo '<p align="center"><strong>Vous vous êtes déconnecté avec succès !</strong></p>';
    }elseif(isset($_GET['private'])){
        echo '<p align="center"><strong>Vous n\'êtes pas autorisé à accéder à cette page. Veuillez vous authentifier.</strong></p>';
    }
    ?>
<h2 align="center">Bienvenue sur notre site <?php echo APPLINAME?> !</h2>

<p align="center">Bienvenue sur ce site qui correspond au projet du groupe 1 SIO 18/19</p>
<br>
<p align="center">Vous êtes adhérents, cliquez <a href="connexion_adh.php">ici</a></p>
<p align="center">Vous êtes le responsable légal, cliquez <a href="connexion_resp_leg.php">ici</a></p>
<p align="center">Vous êtes trésorier, cliquez <a href="#">ici</a></p>
<p align="center">Vous êtes membre du CRIB, cliquez <a href="#">ici</a></p>

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
