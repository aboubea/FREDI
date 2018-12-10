


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
?>
<form align="center" action="<?php echo $action; ?>" method="post">

  <p>Date du Trajet :<br/><input type="Date" name="date_frais" required="required"  value="2018-11-26" /></p>
  <p>Nom du Trajet :<br/><input placeholder="Nom du trajet..." name="trajet_frais" required="required"  type="text" value="" /></p>
  <p>Nombre de Kilomètre(s) parcourus :<br/><input placeholder="kilometre parcourus" name="km_parcourus" required="required" type="text" value="" /></p>
  <p>Coût du/des Péage(s)<br/><input placeholder="Frais de peage..." name="cout_peage" required="required"  type="text" value="" /></p>
  <p>Coût du/des Repas<br/><input placeholder="Frais de repas..." name="cout_repas" required="required"  type="text" value="" /></p>
  <p>Coût du/des Hébergement<br/><input placeholder="Frais d'herbergement" name="cout_hebergement" required="required" type="text" value=""/></p>
  <label for="Id_motif">Motifs du Trajet : </label>
  <select id="Id_motif" name="Id_motif"></br>
  <?php
  //Affiche la liste des motifs:
  //print_r($motifs);
  foreach($motifs as $motif){
    echo '<option value="'.$motif->getId_motif().'">'.$motif->getLibelle_motif().'</option>';
  }
  ?>
  </select>
  <br/>
    <br>
    <input type="submit" name="submit" value="Enregister" class="btn btn-primary">
</form>
