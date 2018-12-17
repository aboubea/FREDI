<?php
include 'head.php';
include 'init.php';
// Récupère la liste des Clubs (liste déroulante) et les Adhérents présents (pour ne pas rentrer un email déjà présent)

$id_ligne_frais = isset($_GET['id_ligne_frais']) ? $_GET['id_ligne_frais'] : $_POST['id_ligne_frais'] ;
$lignefraisDAO = new LignefraisDAO;
$lignefrais = $lignefraisDAO->findidligne($id_ligne_frais);

$notefraisDAO = new NotefraisDAO;
$notefrais = $notefraisDAO->findAll();

$motifDAO = new MotifDAO();
$motifs = $motifDAO->findAll();//liste des motifs
?>
<html>
<body>

<?php include 'menu3.php' ; ?>

        <!-- Hero-Section
          ================================================== -->

        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h1 class="header-headline bold"><br></h1>
                <h4 class="header-running-text light"></h4>
                </div><!--hero-left-->
                <div class="base">

<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<!-- Verification de licence si déjà présente dans la BDD -->
<div class="row">

</div>

<div class="row">
        <div class="col-xs-12">
          <h2 align = "center"></h2>
          <p class="text-danger"></p>
          <?php
// Détermine si on a cliqué sur le bouton submit

$submit = isset($_POST['submit']);

if ($submit) {
    // Récupère les données du formulaire
    $date_frais = isset($_POST['date_frais']) ? $_POST['date_frais'] : "";
    $km_parcourus = isset($_POST['km_parcourus']) ? $_POST['km_parcourus'] : "";
    $trajet_frais = isset($_POST['trajet_frais']) ? $_POST['trajet_frais'] : "";
    $cout_peage = isset($_POST['cout_peage']) ? $_POST['cout_peage'] : "";
    $cout_repas = isset($_POST['cout_repas']) ? $_POST['cout_repas'] : "";
    $cout_hebergement = isset($_POST['cout_hebergement']) ? $_POST['cout_hebergement'] : "";
    $id_motif = isset($_POST['Id_motif']) ? $_POST['Id_motif'] : "";
    //$id_note_frais = $_GET['id_note_frais'];

    //-- On hache le mdp donné pour l'insérer dans la BDD --//


    $lignefrais =  new lignefrais(array(
      ":date_frais" => $date_frais,
      ":trajet_frais" => $trajet_frais,
      ":km_parcourus" =>  $km_parcourus,
      ":cout_peage" => $cout_peage,
      ":cout_repas" => $cout_repas,
      ":cout_hebergement" => $cout_hebergement,
      //":Id_motif" => $id_motif,
      //":id_note_frais" => $id_note_frais

    ));

    //echo '<h2>Ligne bien ajoutée</h2>';

    // Ajoute l'enregistrement dans la BDD
    $nb= $lignefraisDAO->update_frais($date_frais,$trajet_frais,$km_parcourus, $cout_peage, $cout_repas, $cout_hebergement);
    //header('Location: connexion_adh.php?inscrit=1&mail='.$mail_inscrit.'');

    // Obligatoire sinon PHP continue à exécuter le script
    exit;
//Si tout n'est pas remplis > erreur
}else{
// Ajout du formulaire d'inscription
  }

    include 'forms/ADH_modifier_Form.php';
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
