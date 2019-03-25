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

  <p>Tarif kilométrique :<br/><input type="number" step="0.01" name="tarif_kilometrique" value="<?php echo $indemnite->getTarif_kilometrique(); ?>" /></p>
  <p><br/><input type="hidden" name="annee" value="<?php echo $annee; ?>" /></p>
  
  <br>
  
  <input type="submit" name="submit" value="Enregister" class="button">
</form>
