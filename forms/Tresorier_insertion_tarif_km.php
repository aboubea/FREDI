


<?php
/**
* Formulaire Tarif KM
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

  <p>Tarif kilométrique  :<br/><input type="number" step="0.01" name="tarif_kilometrique" required="required"  value="11,50" /></p>

  <br/>
  
    <br>
    <input type="submit" name="submit" value="Enregister" class="btn btn-primary">
</form>
