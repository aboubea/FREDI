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
include 'init.php';

// Détermine si on a cliqué sur le bouton submit
$submit = isset($_POST['submit']);

if ($submit) {
    // Formulaire soumi
    // Récupère les données du formulair
    $mail_inscrit = isset($_POST['mail_inscrit']) ? $_POST['mail_inscrit'] : '';
    $mdp_inscrit = isset($_POST['mdp_inscrit']) ? $_POST['mdp_inscrit'] : '';
    
    $responsable_legal = new Responsable_legal(array(
        'nom_resp_leg'=>$nom_resp_leg,
        'prenom_resp_leg'=>$prenom_resp_leg,
        'rue_resp_leg'=>$rue_resp_leg,
        'cp_resp_leg'=>$cp_resp_leg,
        'ville_resp_leg'=>$ville_resp_leg,
        'mail_inscrit'=>$mail_inscrit,
        'mdp_inscrit'=>$mdp_inscrit
    ));
    // Ajoute l'enregistrement dans la BDD
    $nb = $Responsable_legalDAO->insert($responsable_legal);
    header('Location: connexion_resp_leg.php?success=1');
    exit;  // Obligatoire sinon PHP continue à exécuter le script
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