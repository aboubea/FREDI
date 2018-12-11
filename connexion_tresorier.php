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
                <h1 class="header-headline bold">Trésorier</h1>
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
    if (!empty($_POST['mail_tresorier']) and !empty($_POST['mdp_tresorier'])) {
        
        // Récupère les données du formulaire
        $mail_tresorier = isset($_POST['mail_tresorier']) ? $_POST['mail_tresorier'] : '';
        $mdp_tresorier = isset($_POST['mdp_tresorier']) ? $_POST['mdp_tresorier'] : '';

        //-- On instencie le DAO de Tresorier --//
        $tresorier = new TresorierDAO;

        //On vérifie que le mail et mdp soient correct
        if ($tresorier->est_tresorier($mail_tresorier, $mdp_tresorier)) {
            
            //Si c'est bon on lance le processus de session
            session_start();
            
            // On stocke l'email et on redirige l'utilisteur
            $_SESSION['mail_tresorier'] = $mail_tresorier ;
            header('Location: espace_tresorier.php');
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

<h2 align='center'> Connexion à l'espace Trésorier </h2>

<?php
    include 'forms/Trésorier_Connexion_Form.php';
?>

<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a> </p>


<!-- FIN BASE ---------------------------------------------------------------------------------------------------------------- -->
            </div>
        </div><!--hero-->
        

<?php
include 'logo.php';
include 'team.php';
include 'footer.php';
?>

</body>
</html>