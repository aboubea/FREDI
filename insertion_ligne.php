<?php
include 'head.php';
include 'init.php';
session_start();

if (isset($_SESSION['mail_inscrit'])) {
    // Si l'adhérent MAJEUR est connecté, on récupère son mail stocké en SESSION lors de la connexion
    $mail_inscrit = $_SESSION['mail_inscrit'];

    // Et les infos de l'adherent majeur dans $adherent (tableau objet) et notamment sa licence
    $adherentDAO = new AdherentDAO();
    $adherent= $adherentDAO->findByMail($mail_inscrit);
    $licence_adh = $adherent->getLicence_adh();

}elseif(isset($_SESSION['mail_resp_leg'])){
    // Si le responsable est connecté, on récupère son ID stocké en SESSION lors de la connexion
    $id_resp_leg = $_SESSION['id_resp_leg'];

    // Et les infos de l'adherent mineur dans $adherent (tableau objet) et notamment sa licence (via le lien => GET)
    $adherentDAO = new AdherentDAO();
    $licence_adh = isset($_GET['licence_adh']) ? $_GET['licence_adh'] : "";
    $adherent= $adherentDAO->find($licence_adh);
}else{
    // Sinon on redirige vers la page d'accueil avec un message d'erreur
    header('Location:index.php?private=1');
}

//Préparation des méthodes DAO  des lignes de frais
$lignefraisDAO = new LignefraisDAO;

//Récupération des motifs de frais
$motifDAO = new MotifDAO();
$motifs = $motifDAO->findAll();

?>
<html>
<body>

<?php include 'menu3.php' ; ?>

<!-- Hero-Section -->
  <div class="hero row">
      <div class="hero-right col-sm-6 col-sm-6">
          <h1 class="header-headline bold">Insertion Frais<br></h1>
          <h4 class="header-running-text light"><?php echo "Licencié :  ". $adherent->getPrenom_adh() . ' ' . $adherent->getNom_adh() . "";?></h4>
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
      $id_note_frais = $_GET['id_note_frais'] ? $_GET['id_note_frais'] : "";

      if (is_numeric($km_parcourus) && is_numeric($cout_peage) && is_numeric($cout_repas) && is_numeric($cout_hebergement)) {
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

          $nb = $lignefraisDAO->insert($date_frais, $trajet_frais, $km_parcourus, $cout_peage, $cout_repas, $cout_hebergement, $id_motif, $id_note_frais);

          header('Location: lire_ligne.php?ligne_ajoutee=1&id_note_frais='.$id_note_frais.'&licence_adh='. $adherent->getLicence_adh() .'');
          // Obligatoire sinon PHP continue à exécuter le script
          exit;
      }else{
        echo '<p align="center">Vous devez saisir les <strong>bonnes valeurs</strong> (nombres/textes)</p>';
      }
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