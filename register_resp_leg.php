<?php
include 'head.php';
include 'init.php';

session_start();
include 'inc/user_restriction.php';

// On récupère la liste des responsables légaux présents dans la BDD
$responsable_legalDAO = new Responsable_legalDAO;
$responsables_legal = $responsable_legalDAO->findAll();

?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Responsable<br> Legal</h1>
                <h4 class="header-running-text light"> Vous êtes sur la page d'inscription ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<?php

// Détermine si on a cliqué sur le bouton submit
$submit = isset($_POST['submit']);
$erreur = "";

// Formulaire soumi
if ($submit) {
    if (!empty($_POST['nom_resp_leg']) AND ! empty($_POST['prenom_resp_leg']) AND ! empty($_POST['rue_resp_leg']) AND ! empty($_POST['cp_resp_leg']) AND ! empty($_POST['ville_resp_leg']) AND ! empty($_POST['mail_resp_leg']) AND ! empty($_POST['mdp_resp_leg'])) { 
    // Récupère les données du formulaire
    $nom_resp_leg = isset($_POST['nom_resp_leg']) ? $_POST['nom_resp_leg'] : '';
    $prenom_resp_leg = isset($_POST['prenom_resp_leg']) ? $_POST['prenom_resp_leg'] : '';
    $rue_resp_leg = isset($_POST['rue_resp_leg']) ? $_POST['rue_resp_leg'] : '';
    $cp_resp_leg = isset($_POST['cp_resp_leg']) ? $_POST['cp_resp_leg'] : '';
    $ville_resp_leg = isset($_POST['ville_resp_leg']) ? $_POST['ville_resp_leg'] : '';
    $mail_resp_leg = isset($_POST['mail_resp_leg']) ? $_POST['mail_resp_leg'] : '';
    $mdp_resp_leg = isset($_POST['mdp_resp_leg']) ? $_POST['mdp_resp_leg'] : '';
    
    //-- On hache le mdp donné pour l'insérer dans la BDD --//
    $mdp_hash = password_hash($mdp_resp_leg, PASSWORD_BCRYPT);

    $responsable_legal = new Responsable_legal(array(
        'nom_resp_leg'=>$nom_resp_leg,
        'prenom_resp_leg'=>$prenom_resp_leg,
        'rue_resp_leg'=>$rue_resp_leg,
        'cp_resp_leg'=>$cp_resp_leg,
        'ville_resp_leg'=>$ville_resp_leg,
        'mail_resp_leg'=>$mail_resp_leg,
        'mdp_resp_leg'=>$mdp_hash
    ));

    // Ajoute l'enregistrement dans la BDD
    $nb = $responsable_legalDAO->insert($responsable_legal);
    header('Location: connexion_resp_leg.php?inscrit=1&mail='.$mail_resp_leg.'');

    // Obligatoire sinon PHP continue à exécuter le script
    exit;

//Si tout n'est pas remplis > erreur
} else {    
    $erreur = "<p align='center'><strong>Vous n'avez pas saisis toutes les informations ! Veuillez remplir tous les champs svp.</strong></p>";
}
}


?>

<h2 align='center'> Inscription Responsable Legal </h2>
<br />
<?php
    // Formulaire d'inscription du responsable legal
    include 'forms/RL_Inscription_Form.php';
?>

<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a> | <a href="connexion_resp_leg.php">Vous possédez déjà un compte ?</a></p>


<!-- FIN BASE ---------------------------------------------------------------------------------------------------------------- -->
            </div>
        </div><!--hero-->
    </div> <!--hero-container-->
</div><!--hero-background-->

<?php
include 'logo.php';
include 'team.php';
include 'footer.php';
?>

</body>
</html>