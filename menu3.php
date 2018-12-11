<!-- Navigation
    ================================================== -->
    <div class="hero-background">
    <div>
        <img class="strips" src="assets/images/strips.png">
    </div>
    <div class="container">
        <div class="header-container header">
        <!-- Logo du site et lien -->    
        <a href="index.php"><img src="https://fontmeme.com/permalink/181008/87511f2ac6fe29852d1f7bfe3b26ce87.png" alt="polices-de-calligraphie" border="0"></a>
            
            <?php
            // MENU RESPONSABLE LEGAL
                if (isset($_SESSION['mail_resp_leg'])){
                    ?>

                    <!-- Se deconnecter -->
                    <a href="deconnexion.php">
                    <button class="header-btn">Deconnexion</button>
                    </a>

                    <!-- Inscription d'un Adhérent -->
                    <a href="register_adh.php">
                    <button class="header-btn">Inscrire un licencié</button>
                    </a>
                    
                    <!-- Espace Responsable legal -->
                    <a href="espace_resp_leg.php">
                        <button class="header-btn">Espace Personnel</button>
                    </a>
            
            <?php
            // MENU ADHERENT   
            }elseif(isset($_SESSION['mail_inscrit'])){
                ?>
                                
                <!-- Se deconnecter -->
                <a href="deconnexion.php">
                <button class="header-btn">Deconnexion</button>
                </a>

                <!-- Bordereaux de l'adhérent -->
                <a href="list_borderaux.php">
                <button class="header-btn">Mes bordereaux</button>
                </a>

                <!-- Espace Adherent -->
                <a href="espace_adh.php">
                    <button class="header-btn">Espace Personnel</button>
                </a>

        <?php
        // MENU RESPONSABLE CRIB    
            }elseif(isset($_SESSION['mail_resp_crib'])){
            ?>
                <!-- Se deconnecter
                <a href="deconnexion.php">
                <button class="header-btn">Deconnexion</button>
                </a>
                -->

                <!-- Gestion des clubs (ajouts / suppressions)
                <a href=espace_club.php">
                <button class="header-btn">Gestion Clubs</button>
                </a>
                -->

                <!-- Gestion des adhérents pré-inscrit (CSV -> ajout / suppression d'adherent dans CSV)
                <a href=espace_csv.php">
                <button class="header-btn">Gestion CSV</button>
                </a>
                -->

                <!-- Gestion du tarif killométrique (ajout / modification)
                <a href=tarif.php">
                <button class="header-btn">Gestion Tarif</button>
                </a>
                -->

                <!-- Gestion des motifs (ajout / suppression / modification)
                <a href=motifs.php">
                <button class="header-btn">Gestion Tarif</button>
                </a>
                -->

                <!-- Espace Responsable Crib
                <a href="espace_resp_crib.php">
                    <button class="header-btn">Espace Personnel</button>
                </a>
                -->

        <?php
        //MENU TRESORIER
    }elseif(isset($_SESSION['mail_tresorier'])){
        ?>

            
            <a href="deconnexion.php">
            <button class="header-btn">Deconnexion</button>
            </a>
            

            <!-- Gestion des clubs (ajouts / suppressions)
            <a href=espace_club.php">
            <button class="header-btn">Gestion Clubs</button>
            </a>
            -->

            <!-- Gestion des notes de frais (validation)
            <a href=note_frais.php">
            <button class="header-btn">Gestion des bordereaux</button>
            </a>
            -->

            <!-- Production CERFA (en 2 exemplaires)
            <a href=cerfa.php">
            <button class="header-btn">Production CERFA</button>
            </a>
            -->

           
            <a href="espace_tresorier.php">
                <button class="header-btn">Espace Personnel</button>
            </a>
            
            
        <?php
        //MENU VISITEUR
            }else{
        ?>
            <!-- Espace Administration -->
            <a href="#">
                <button class="header-btn">Espace Trésorier</button>
            </a>
            
            <!-- Responsable legal -->
            <a href="connexion_resp_leg.php">
                <button class="header-btn">Espace Responsable Legal</button>
            </a>

            <!-- Adhérent -->
            <a href="connexion_adh.php">
                <button class="header-btn"> Espace Adhérent</button>
            </a>

            <!-- Accueil -->
            <a href="index.php">
                <button class="header-btn">Accueil</button>
            </a>

            <!-- Autre -->
            <div class="header-right">
            <a href="index.php">Accueil</a>
            </div>
            
            <?php 
            }
            ?>

        </div>
        <!--navigation-->