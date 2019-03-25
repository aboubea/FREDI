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
                <h1 class="header-headline bold">Adhérent</h1>
                <h4 class="header-running-text light"> Connectez-vous ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<?php
// Détermine si on a cliqué sur le bouton submit
$submit = isset($_POST['submit']);
$erreur = "";

// Formulaire soumi
if ($submit) {
    
    // Toutes les données sont saisies
    if (!empty($_POST['mail_inscrit']) and !empty($_POST['mdp_inscrit'])) {
        
        // Récupère les données du formulaire
        $mail_inscrit = isset($_POST['mail_inscrit']) ? $_POST['mail_inscrit'] : '';
        $mdp_inscrit = isset($_POST['mdp_inscrit']) ? $_POST['mdp_inscrit'] : '';

        //-- On instencie le DAO de Adhérent --//
        $adherent = new AdherentDAO;

        //On vérifie que le mail et mdp soient correct
        if ($adherent->est_inscrit($mail_inscrit, $mdp_inscrit)) {
            
            // Si le mail corresmond avec le mot de passe, on récupère les infos à stocker en session

            //Si c'est bon on lance le processus de session
            session_start();
            
            // On stocke l'email et on redirige l'utilisteur
            $_SESSION['mail_inscrit'] = $mail_inscrit;

            header('Location: espace_adh.php');
            exit;
            
            //Si l'email et le mdp ne correspondent pas
        } else {
            $erreur = "<p align='center'><strong>Vous avez saisi un mauvais mot de passe ou email, veuillez réessayer svp.</strong></p>";
        }
        //Si tout n'est pas remplis --> erreur
    } else {    
        $erreur = "<p align='center'><strong>Vous n'avez pas saisis toutes les informations ! Veuillez remplir tous les champs svp.</strong></p>";
    }
}
?>

<h2 align='center'> Connexion à l'espace Adhérent </h2>

<?php
    include 'forms/ADH_Connexion_Form.php';
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



</body>
</html>