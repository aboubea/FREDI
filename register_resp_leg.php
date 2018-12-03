<?php
include 'head.php';
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
include 'config/init.php';

// Détermine si on a cliqué sur le bouton submit
$submit = isset($_POST['submit']);
$erreur = "";

if ($submit) {
    if (!empty($_POST['nom_resp_leg']) AND ! empty($_POST['prenom_resp_leg']) AND ! empty($_POST['rue_resp_leg']) AND ! empty($_POST['cp_resp_leg']) AND ! empty($_POST['ville_resp_leg']) AND ! empty($_POST['mail_inscrit']) AND ! empty($_POST['mdp_inscrit'])) { 
    // Formulaire soumi
    // Récupère les données du formulaire
    $nom_resp_leg = isset($_POST['nom_resp_leg']) ? $_POST['nom_resp_leg'] : '';
    $prenom_resp_leg = isset($_POST['prenom_resp_leg']) ? $_POST['prenom_resp_leg'] : '';
    $rue_resp_leg = isset($_POST['rue_resp_leg']) ? $_POST['rue_resp_leg'] : '';
    $cp_resp_leg = isset($_POST['cp_resp_leg']) ? $_POST['cp_resp_leg'] : '';
    $ville_resp_leg = isset($_POST['ville_resp_leg']) ? $_POST['ville_resp_leg'] : '';
    $mail_inscrit = isset($_POST['mail_inscrit']) ? $_POST['mail_inscrit'] : '';
    $mdp_inscrit = isset($_POST['mdp_inscrit']) ? $_POST['mdp_inscrit'] : '';
    
    //-- On hache le mdp donné pour l'insérer dans la BDD --//
    $mdp_hash = password_hash($mdp_inscrit, PASSWORD_BCRYPT);

    $responsable_legal = new Responsable_legal(array(
        'nom_resp_leg'=>$nom_resp_leg,
        'prenom_resp_leg'=>$prenom_resp_leg,
        'rue_resp_leg'=>$rue_resp_leg,
        'cp_resp_leg'=>$cp_resp_leg,
        'ville_resp_leg'=>$ville_resp_leg,
        'mail_inscrit'=>$mail_inscrit,
        'mdp_inscrit'=>$mdp_hash
    ));
    // Ajoute l'enregistrement dans la BDD
    $nb = $Responsable_legalDAO->insert($responsable_legal);
    header('Location: connexion_resp_leg.php?inscrit=1');
    exit;  // Obligatoire sinon PHP continue à exécuter le script

} else {    //Si tout n'est pas remplis > erreur
    $erreur = "<p align='center'><strong>Vous n'avez pas saisis toutes les informations ! Veuillez remplir tous les champs svp.</strong></p>";
}
}


?>

<h2 align='center'> Inscription du Responsable Legal </h2>
<br />
<?php
    include 'forms/RL_Inscription_Form.php';
?>

<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a></p>


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