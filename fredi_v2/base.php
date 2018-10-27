
<html>
<body>

<!-- Navigation
    ================================================== -->
<div class="hero-background">
    <div>
        <img class="strips" src="assets/images/strips.png">
    </div>
    <div class="container">
        <div class="header-container header">
            <a href="index.html"><img src="https://fontmeme.com/permalink/181008/87511f2ac6fe29852d1f7bfe3b26ce87.png" alt="polices-de-calligraphie" border="0"></a>
            <a href="#email-form">
                <button class="header-btn"> Plus d'infos</button>
            </a>
            <div class="header-right">
                <a class="navbar-item" href="#team">L'équipe</a>
            </div>
        </div>
        <!--navigation-->
        

        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold"> Bienvenue sur notre site FREDI <br></h1>
                <h4 class="header-running-text light"> Ce service web a été réalisé par <ul><li>Antoine BELLINO</li><li>Yann DO REGO</li><li>Paco BARBE</li><li>Antoine BOUBE ASTUGUE</li></ul> </h4>
                </div><!--hero-left-->
                <div class="base">
                    <?php
                    
                        if (!empty($_SESSION)) {
                            echo "<h1>Bienvenue sur notre FREDI <br /><strong><i>". $_SESSION['nom']."</i></strong> </h1>";
                            } else
                            {
                                include 'login.php';
                                echo '<a href ="base2.php">Ou inscrivez vous ici<a>';
                            } 
                    ?>
                    
            </div>
            
        </div><!--hero-->



    </div> <!--hero-container-->
    
</div><!--hero-background-->






</body>
</html>