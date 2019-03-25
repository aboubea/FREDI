<?php
/**
* Formulaire Adherents
*
*/

// Si l'action n'est pas fournie, on la crée avec la valeur par défaut (le formulaire s'appelle lui-même)
if (!isset($action)) {
  $action = '#';
}

if (isset($erreur)) {
  //Si une erreur est créée, elle s'affichera ici
  echo $erreur;
}
$id_motif = $lignefrais->getId_motif();

?>
<form align="center" action="<?php echo $action; ?>" method="post">

  <p>Date du Trajet :<br/><input type="Date" name="date_frais"   value="<?php echo $lignefrais->getdate_frais(); ?>" /></p>
  <p>frais Trajet :<br/><input  name="trajet_frais" required="required"  type="text" value="<?php echo $lignefrais->gettrajet_frais(); ?>" /></p>
  <p>Nombre de Kilomètre(s) parcourus :<br/><input  name="km_parcourus" required="required" type="number" value="<?php echo $lignefrais->getkm_parcourus(); ?>" /></p>
  <p>Coût du/des Péage(s)<br/><input  name="cout_peage" required="required"  type="number" value="<?php echo $lignefrais->getCout_peage();?>" /></p>
  <p>Coût du/des Repas<br/><input  name="cout_repas" required="required"  type="number" value="<?php echo $lignefrais->getCout_repas();?>" /></p>
  <p>Coût du/des Hébergement<br/><input  name="cout_hebergement" required="required" type="number" value="<?php echo $lignefrais->getCout_hebergement();?>"/></p>

  <label for="Id_motif">Motifs du Trajet : </label>
  <select id="Id_motif" name="Id_motif"></br>
  <?php
  //Affiche la liste des motifs:
  //print_r($motifs);
  foreach($motifs as $motif){
  if ($id_motif === $motif->getId_motif() ){
   $motif_id = $motif->getId_motif();
   $motif_libelle = $motif->getLibelle_motif();
  echo '<option selected="selected" value="'.$motif_id.'">'.$motif_libelle.'</option>';
  }
  }

  foreach($motifs as $motif){
    echo '<option value="'.$motif->getId_motif().'">'.$motif->getLibelle_motif().'</option>';
  }
  ?>
  </select>
  <br/>
    <br>
    <input type="submit" name="submit" value="Enregister" class="button">
</form>
