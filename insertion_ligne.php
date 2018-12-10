<?php
include 'head.php';
include 'init.php';
// Récupère la liste des Clubs (liste déroulante) et les Adhérents présents (pour ne pas rentrer un email déjà présent)
$lignefraisDAO = new LignefraisDAO;
$lignefrais = $lignefraisDAO->findAll();
$motifDAO = new MotifDAO();
$motifs = $motifDAO->findAll();//liste des motifs
//$ligueDAO = new ligueDAO();


$notefraisDAO = new NotefraisDAO;
$notefrais = $notefraisDAO->findAll();

?>

<?php
session_start();
$mail_inscrit = $_SESSION['mail_inscrit'];
$adherentDAO = new AdherentDAO();
$adherent= $adherentDAO->findByMail($mail_inscrit);
?>
<html>
<body>

<?php include 'menu3.php' ; ?>

<!-- Hero-Section
  ================================================== -->
  <div class="hero row">
      <div class="hero-right col-sm-6 col-sm-6">
          <h1 class="header-headline bold">Insertion<br></h1>
          <h4 class="header-running-text light">Lignes de frais ></h4>
          </div><!--hero-left-->
          <div class="base">


<!-- DEBUT BASE ------------------------------------------------------------------------------------------------------------- -->

<h2 align='center'>Insertion d'une ligne de frais</h2>

  <?php

  $submit = isset($_POST['submit']);

  if($submit){
      $date_frais = isset($_POST['date_frais']) ? $_POST['date_frais'] : "";
      $km_parcourus = isset($_POST['km_parcourus']) ? $_POST['km_parcourus'] : "";
      $trajet_frais = isset($_POST['trajet_frais']) ? $_POST['trajet_frais'] : "";
      $cout_peage = isset($_POST['cout_peage']) ? $_POST['cout_peage'] : "";
      $cout_repas = isset($_POST['cout_repas']) ? $_POST['cout_repas'] : "";
      $cout_hebergement = isset($_POST['cout_hebergement']) ? $_POST['cout_hebergement'] : "";
      $id_motif = isset($_POST['Id_motif']) ? $_POST['Id_motif'] : "";
      $id_note_frais = $_GET['id_note_frais'];

      $lignefrais =  new lignefrais(array(
        ":date_frais" => $date_frais,
        ":trajet_frais" => $trajet_frais,
        ":km_parcourus" =>  $km_parcourus,
        ":cout_peage" => $cout_peage,
        ":cout_repas" => $cout_repas,
        ":cout_hebergement" => $cout_hebergement,
        ":Id_motif" => $id_motif,
        ":id_note_frais" => $id_note_frais
      ));
          // Ajoute l'enregistrement dans la BDD
         
            $licence_adh = $adherent->getLicence_adh();
          echo '<h2>Ligne bien ajoutée</h2>';


          $nb = $lignefraisDAO->insert($date_frais,$trajet_frais,$km_parcourus,$cout_peage,$cout_repas,$cout_hebergement,$id_motif, $id_note_frais);

          //$nb2 = $notefraisDAO->insert($licence_adh, $id_ligne_frais)
          //header('Location: connexion_adh.php?inscrit=1&mail='.$mail_inscrit.'');
          exit;  // Obligatoire sinon PHP continue à exécuter le script

  } else {
      //$erreur = "<p align='center'><strong>Vous n'avez pas saisis toutes les informations ! Veuillez remplir tous les champs svp.</strong></p>";
  }

  // Ajout du formulaire d'inscription
      include 'forms/ADH_insertion_ligne_Form.php';
  ?>

  <p align="center"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a> | <a href="index.php">Page d'accueil</a></p>
  
<!-- FIN BASE ---------------------------------------------------------------------------------------------------------------- -->
</div>
        </div><!--hero-->

    </div> <!-- hero-container -->
</div><!--hero-background-->

<?php
include 'logo.php';
include 'team.php';
include 'footer.php';
?>

</body>
</html>