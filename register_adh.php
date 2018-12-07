<?php
include 'head.php';
include 'init.php';
// Récupère la liste des Clubs (liste déroulante) et les Adhérents présents (pour ne pas rentrer un email déjà présent)
$adherentDAO = new AdherentDAO;
$adherents = $adherentDAO->findAll(); //Liste desadherents
$clubDAO = new ClubDAO;
$clubs = $clubDAO->findAllClubs(); //Liste des clubs
?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Adhérent<br></h1>
                <h4 class="header-running-text light"> Inscrivez-vous ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<!-- Verification de licence si déjà présente dans la BDD -->
<div class="row">
        <div class="col-xs-12">
          <h2 align = "center">Vérifier ma licence</h2>
          <p align = "center">Votre licence se trouve peut-être déjà dans notre base de données, cliquez sur "Tester" afin de tester votre licence.</p>
          <p align ="center"><a class="btn btn-primary" href="#" role="button" >Tester</a></p>
       </div>
</div>

<div class="row">
        <div class="col-xs-12">
          <h2 align = "center">Inscription Adhérent</h2>
          <p class="text-danger">Si vous venez d'acquérir une nouvelle licence, remplissez les champs prévus pour l'inscription et cliquez sur "s'inscrire".</p>
          <?php
// Détermine si on a cliqué sur le bouton submit
$submit = isset($_POST['submit']);
$erreur = "";

if ($submit) {
    if (!empty($_POST['licence_adh']) AND !empty($_POST['nom_adh']) AND !empty($_POST['prenom_adh']) AND !empty($_POST['sexe_adh']) AND !empty($_POST['date_naissance_adh']) AND !empty($_POST['adresse_adh']) AND !empty($_POST['cp_adh']) AND !empty($_POST['ville_adh']) AND !empty($_POST['mail_inscrit']) AND !empty($_POST['mdp_inscrit'])) { 
    // Formulaire soumi
    // Récupère les données du formulaire
    $licence_adh = isset($_POST['licence_adh']) ? $_POST['licence_adh'] : '';
    $nom_adh = isset($_POST['nom_adh']) ? $_POST['nom_adh'] : '';
    $prenom_adh = isset($_POST['prenom_adh']) ? $_POST['prenom_adh'] : '';
    $sexe_adh = isset($_POST['sexe_adh']) ? $_POST['sexe_adh'] : '';
    $date_naissance_adh = isset($_POST['date_naissance_adh']) ? $_POST['date_naissance_adh'] : '';
    $adresse_adh = isset($_POST['adresse_adh']) ? $_POST['adresse_adh'] : '';
    $cp_adh = isset($_POST['cp_adh']) ? $_POST['cp_adh'] : '';
    $ville_adh = isset($_POST['ville_adh']) ? $_POST['ville_adh'] : '';
    $mail_inscrit = isset($_POST['mail_inscrit']) ? $_POST['mail_inscrit'] : '';
    $mdp_inscrit = isset($_POST['mdp_inscrit']) ? $_POST['mdp_inscrit'] : '';
    $id_club = isset($_POST['id_club']) ? $_POST['id_club'] : '';
    
    //-- On hache le mdp donné pour l'insérer dans la BDD --//
    $mdp_hash = password_hash($mdp_inscrit, PASSWORD_BCRYPT);

    $adherent = new Adherent(array(
        'licence_adh'=>$licence_adh,
        'nom_adh'=>$nom_adh,
        'prenom_adh'=>$prenom_adh,
        'sexe_adh'=>$sexe_adh,
        'date_naissance_adh'=>$date_naissance_adh,
        'adresse_adh'=>$adresse_adh,
        'cp_adh'=>$cp_adh,
        'ville_adh'=>$ville_adh,
        'mail_inscrit'=>$mail_inscrit,
        'mdp_inscrit'=>$mdp_hash,
        'id_club'=>$id_club
    ));

    // Ajoute l'enregistrement dans la BDD
    $nb = $adherentDAO->insert($adherent);
    header('Location: connexion_adh.php?inscrit=1&mail='.$mail_inscrit.'');

    // Obligatoire sinon PHP continue à exécuter le script
    exit;  

//Si tout n'est pas remplis > erreur
} else {    
    $erreur = "<p align='center'><strong>Vous n'avez pas saisis toutes les informations ! Veuillez remplir tous les champs svp.</strong></p>";
}
}
// Ajout du formulaire d'inscription
    include 'forms/ADH_Inscription_Form.php';
?>

        </div>
</div>

<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a> | <a href="connexion_adh.php">Vous possédez déjà un compte ?</a></p></p>


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