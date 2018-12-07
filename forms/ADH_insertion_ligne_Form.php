


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

  <p>date<br/><input type="Date" name="date_frais" required="required"  value="2018-11-26" /></p>
  <p>frais trajets:<br/><input placeholder="Entrez vos frais de trajets.." name="trajet_frais" required="required"  type="text" value="" /></p>
  <p>kilometre parcourus:<br/><input placeholder="kilometre parcourus" name="km_parcourus" required="required" type="text" value="" /></p>
  <p>cout peage<br/><input placeholder="frais de peage.." name="cout_peage" required="required"  type="text" value="" /></p>
  <p>cout repas<br/><input placeholder="frais de repas.." name="cout_repas" required="required"  type="text" value="" /></p>
  <p>cout herbergement<br/><input placeholder="frais d'herbergement" name="cout_hebergement" required="required" type="text" value=""/></p>
  <label for="Id_motif">motifs : </label>
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
    <input type="submit" name="submit" value="Enregister" class="button">
</form>
