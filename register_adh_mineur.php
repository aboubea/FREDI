<?php
include 'head.php';
include 'init.php';

//On démarre la session
session_start();

//On vérifie que le responsable legal est bien connecté
if (isset($_SESSION['mail_resp_leg'])) {
    $mail_resp_leg = $_SESSION['mail_resp_leg'];
}else{
  header('Location:index.php?private=1');
}

//On récupère les détails du responsable légal afin d'obtenir son ID (pour l'insertion d'un adhérent associé a son responsable dans le formulaire)
$responsable_legalDAO = new Responsable_legalDAO();
$responsable_legal = $responsable_legalDAO->findByMail($mail_resp_leg);
$id_resp_leg = $responsable_legal->getId_resp_leg();

// On récupère la liste des adhérents présents dans la BDD
$adherentDAO = new AdherentDAO;
$adherents = $adherentDAO->findAll();

// On récupère la liste des clubs présents dans la BDD
$clubDAO = new ClubDAO;
$clubs = $clubDAO->findAllClubs();

// On prépare les méthodes de adherentCSVDAO
$adherentCSVDAO = new AdherentCSVDAO;
?>
<html>
<body>

<?php include 'menu3.php' ; ?>
        
        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold">Responsable <br>Legal</h1>
                <h4 class="header-running-text light">Vous allez inscrire un licencié mineur ></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<!-- Verification de licence si déjà présente dans la BDD -->
<div class="row">
        <div class="col-xs-12">
          <h2 align = "center">Inscription d'un licencié mineur</h2>

          <?php
          //Si le formulaire de test est fini on affichera l'autre formulaire d'inscription
          $form_test=false;
          $submit2 = isset($_POST['submit2']);

          //Si on saisi la licence (formulaire de test)
          if ($submit2) {

            //On récupère la licence saisie dans le formulaire
            $licence_adh_csv = isset($_POST['licence_adh_csv']) ? $_POST['licence_adh_csv'] : '';

            // On récupère les données de l'adhérent dans la table CSV par sa licence (s'il n'est pas présent, il n'y aura pas de données pré-remplies)
            $adherent_csv = $adherentCSVDAO->find($licence_adh_csv);
            
            //Début de vérification d'un adhérent 
            if ($adherent_csv ==! false && $adherent_csv->getLicence_adh_csv() ==! "" ) {
            $message = "La licence a été trouvée dans notre base de données ! Veuillez fournir un mail, un mot de passe et le club associé.";
            ?>
                <h3 align = "center">Etape 2 : Inscription d'un licencié existant</h2> 
            <?php
            // Sinon le message change car l'adhérent n'existe pas dans le CSV
            } else {
                $message = "La licence ne se trouve pas dans notre base de données, veuillez inscrire l'adhérent via le formulaire ci-dessous.";
                ?>
                <h3 align = "center">Etape 2 : Inscription d'un nouveau licencié</h2>
            <?php
            } //Fin de vérification
             
            //Le formulaire 1 est fini
            $form_test=true;

        //Tant que le formulaire 1 (Tester sa licence) n'est pas complété, on l'affiche 
          }else{
              ?>
            <h3 align = "center">Etape 1 : Vérification de la licence</h2>
            <p align = "center">La licence se trouve peut-être déjà dans notre base de données, saisissez-la puis cliquez sur "Vérifier"</p>
          <?php
            //Formulaire pour tester si l'adhérent est présent dans la BDD (submit2)
            include 'forms/ADH_Test_Licence.php';
          }
          ?>
    </div>
</div>

<div class="row">
        <div class="col-xs-12">
          <?php
// Détermine si on a cliqué sur le bouton submit
$submit = isset($_POST['submit']);
$erreur = "";

// Formulaire soumi
if ($submit) {
    if (!empty($_POST['licence_adh']) AND !empty($_POST['nom_adh']) AND !empty($_POST['prenom_adh']) AND !empty($_POST['sexe_adh']) AND !empty($_POST['date_naissance_adh']) AND !empty($_POST['adresse_adh']) AND !empty($_POST['cp_adh']) AND !empty($_POST['ville_adh'])) { 
    // Récupère les données du formulaire
    $licence_adh = isset($_POST['licence_adh']) ? $_POST['licence_adh'] : '';
    $nom_adh = isset($_POST['nom_adh']) ? $_POST['nom_adh'] : '';
    $prenom_adh = isset($_POST['prenom_adh']) ? $_POST['prenom_adh'] : '';
    $sexe_adh = isset($_POST['sexe_adh']) ? $_POST['sexe_adh'] : '';
    $date_naissance_adh = isset($_POST['date_naissance_adh']) ? $_POST['date_naissance_adh'] : '';
    $adresse_adh = isset($_POST['adresse_adh']) ? $_POST['adresse_adh'] : '';
    $cp_adh = isset($_POST['cp_adh']) ? $_POST['cp_adh'] : '';
    $ville_adh = isset($_POST['ville_adh']) ? $_POST['ville_adh'] : '';
    $mail_inscrit = isset($_POST['mail_inscrit']) ? $_POST['mail_inscrit'] : null;
    $mdp_inscrit = isset($_POST['mdp_inscrit']) ? $_POST['mdp_inscrit'] : null;
    $id_club = isset($_POST['id_club']) ? $_POST['id_club'] : '';

    //On vérifie si l'adhérent est mineur
    $date_now = date("Y-m-d");
    $datetime1 = new DateTime($date_now);
    $datetime2 = new DateTime($date_naissance_adh);
    $interval = $datetime1->diff($datetime2);

    if ($interval->format('%Y') <= "18"){

    //-- On hache le mdp donné pour l'insérer dans la BDD --//
    if ($mdp_inscrit !== null && $mdp_inscrit !== "") {
        $mdp_hash = password_hash($mdp_inscrit, PASSWORD_BCRYPT);
    }
    else{
        $mdp_hash = null;
        $mail_inscrit = null;
    }

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
        'id_club'=>$id_club,
        'id_resp_leg'=>$id_resp_leg
    ));

    // Ajoute l'enregistrement dans la BDD
    $nb = $adherentDAO->insert($adherent, $id_resp_leg);

    // On insert un bordereau automatiquement pour l'adhérent mineur
    $notefraisDAO = new NotefraisDAO();
    $nb1 = $notefraisDAO->insert($licence_adh, $id_club);

    header('Location: espace_resp_leg.php?inscrit=1');

    // Obligatoire sinon PHP continue à exécuter le script
    exit;  
//Si l'adhérent n'est pas majeur on le redirige
} else {
    echo "<p align='center'><strong><i class='fas fa-exclamation-triangle'></i> Vous devez inscrire un adhérent mineur ! </strong><i class='fas fa-exclamation-triangle'></i></p>";
}
//Si tout n'est pas remplis > erreur
} else {    
    $erreur = "<p align='center'><i class='fas fa-exclamation-triangle'></i><strong> Vous n'avez pas saisis toutes les informations ! Veuillez remplir tous les champs svp. </strong><i class='fas fa-exclamation-triangle'></i></p>";
}
}

// Formulaire d'inscription de l'adhérent
if ($form_test === true) {
    include 'forms/ADH_CSV_Inscription_Form.php';
}
?>
        </div>
</div>

<p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="espace_resp_leg.php">Espace personnel</a></p>


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