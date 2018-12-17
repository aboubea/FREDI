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
                <h1 class="header-headline bold">Responsable<br> Legal</h1>
                <h4 class="header-running-text light"> Inscrivez-vous ></h4>
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
    if (!empty($_POST['mail_resp_leg']) and !empty($_POST['mdp_resp_leg'])) {

        // Récupère les données du formulaire
        $mail_resp_leg = isset($_POST['mail_resp_leg']) ? $_POST['mail_resp_leg'] : '';
        $mdp_resp_leg = isset($_POST['mdp_resp_leg']) ? $_POST['mdp_resp_leg'] : '';

        //-- On instencie le DAO de Responsable_legalDAO --//
        $responsable_legal = new Responsable_legalDAO;

        //On vérifie que le mail et mdp soient correct
        if ($responsable_legal->est_inscrit($mail_resp_leg, $mdp_resp_leg)) {
            
            //Si c'est bon on lance le processus de session
            session_start();
            
            // On stocke l'email et on redirige l'utilisteur
            $_SESSION['mail_resp_leg'] = $mail_resp_leg ;
            header('Location: espace_resp_leg.php');
            exit;
            
            //Si l'email et le mdp ne correspondent pas
        } else {
            //$responsable_legal->is_bug($mail_resp_leg, $mdp_resp_leg);
            $erreur = "<p align='center'><strong>Vous avez saisi un mauvais mot de passe ou email, veuillez réessayer svp.</strong></p>";
        }
        //Si tout n'est pas remplis --> erreur
    } else {    
        $erreur = "<p align='center'><strong>Vous n'avez pas saisis toutes les informations ! Veuillez remplir tous les champs svp.</strong></p>";
    }
}
?>

<h2 align='center'> Connexion à l'espace Responsable Legal</h2>

<?php
    include 'forms/RL_Connexion_Form.php';
?>

<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a> | <a href="register_resp_leg.php">Pas encore inscrit ?</a></p>


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