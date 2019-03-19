<?php


session_start();
require('pdf/fpdf/fpdf.php');
include "fco.php";

$id=isset($_GET['id_note_frais']) ? $_GET['id_note_frais'] : '_';

$dsn = 'mysql:host=localhost;dbname=fredi';
$user = "root";
$pass = '';

$con = db_connect($dsn, $user, $pass);

    $sql = "SELECT adherent.licence_adh, note_frais.annee, ligne_frais.trajet_frais, nom_adh, prenom_adh,adresse_adh, cp_adh, ville_adh, date_frais, km_parcourus, cout_peage, cout_repas, cout_hebergement, libelle_motif
    FROM note_frais, adherent, ligne_frais, motif
    WHERE adherent.licence_adh=note_frais.licence_adh
    AND note_frais.id_note_frais=ligne_frais.id_note_frais
    AND ligne_frais.id_motif= motif.id_motif
    AND note_frais.id_note_frais =  $id;
    ";
    try {
      $sth = $con->prepare($sql);
      $sth->execute();
      $formulaires = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
      die("<p>Erreur lors de la requete SQL : " . $ex->getMessage() . "</p>");
    }


  class MON_PDF extends FPDF {

    function Header() {
      // Police Arial gras 15
      $this->SetFont('Arial','B',15);
      // Titre
      $this->Cell(0,10,'Tableau','B',0,'C');
      // Saut de ligne
      $this->Ln(20);
    }
  
    function Footer() {
      // Positionnement a 1 cm du bas
      $this->SetY(-10);
      // Police Arial italique 8
      $this->SetFont('Arial','I',8);
      $this->SetTextColor(0,0,0); // Noir
      // Numero de page
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}','T',0,'C');
    }
}
  $pdf = new MON_PDF();
  $pdf = new FPDF();


  

  foreach ($formulaires as $formulaire) {
    $licence = $formulaire['licence_adh'];
    $annee = $formulaire['annee'];
    $nom_adh = $formulaire['nom_adh'];
    $prenom_adh = $formulaire ['prenom_adh']; 
    $adresse_adh = $formulaire['adresse_adh'];
    $cp_adh = $formulaire['cp_adh'];
    $ville_adh = $formulaire['ville_adh'];    
  }

  $pdf->AddPage();
  $pdf->SetFillColor(165, 212, 139);
  $pdf->Image("pdf/img/image1.jpg", 5, 5, 0, 20);
  $pdf->SetY(35);
  $pdf->SetFont('Helvetica','B',16);
  $pdf->Cell(0,10,"Notes de frais des benevoles",0,0,'L');
  $pdf->SetTextColor(0, 0, 0);
  $pdf->SetX(140);
  $pdf->Cell(0,10,"Annee civile ". utf8_decode($annee),0,1,"C",1 );

  $pdf->SetY(50);
  $pdf->SetFont('Helvetica','',12);

  $pdf->Cell(0,7,"Je soussigne(e)",0,1);
  $pdf->Cell(0,7,utf8_decode($nom_adh)." ". utf8_decode($prenom_adh),0,1, "C", 1);
  $pdf->Cell(0,7,"demeurant",0,1);
  $pdf->Cell(0,7,utf8_decode($adresse_adh)." ".utf8_decode($cp_adh)." ".utf8_decode($ville_adh),0,1, "C", 1);
  $pdf->Cell(0,7,"certifie renoncer au remboursement des frais ci-dessous et les laisser a l association",0,1);
  $pdf->Cell(0,7,"Salle d Armes de Villers les Nancy, 1 rue Rodin - 54600 Villers les Nancy	",0,1, "C",1);
  $pdf->Cell(0,7,"en tant que don.",0,1);
  $pdf->Cell(0,7,"Frais de deplacement",0,1);







  // Entête de la liste
  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(25, 10, "Date", 'B', 0, 'C');
  $pdf->Cell(30, 10, "Motif", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Trajet", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Kms", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Cout Trajet", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Peages", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Repas", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Hebergement", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Total", 'B', 1, 'C');
  
  foreach ($formulaires as $formulaire) {
    $trajet_frais = $formulaire['trajet_frais'];
    $date_frais = $formulaire['date_frais'];
    $km_parcourus = $formulaire['km_parcourus'];
    $cout_peage = $formulaire['cout_peage'];
    $cout_repas = $formulaire['cout_repas'];
    $cout_hebergement = $formulaire['cout_hebergement'];
    $libelle_motif = $formulaire['libelle_motif'];
    
    // Liste des employés
  $pdf->SetFont('Arial', '', 8);
  $pdf->Cell(25, 10, utf8_decode($date_frais),1, 0, 'C',1);
  $pdf->Cell(30, 10, utf8_decode($libelle_motif), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($trajet_frais), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($km_parcourus), 1, 0, 'C',1);
  $pdf->Cell(20, 10, " ", 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($cout_peage), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($cout_repas), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($cout_hebergement), 1, 0, 'C',1);
  $pdf->Cell(20, 10, "", 1, 1, 'C',1);
  }
  
  



  $pdf->Output('projet.pdf','d');
