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
<label for="licence_adh_csv">Saisissez votre Licence :</label>
  <input placeholder="Ex. : 170540010556" type="text" name="licence_adh_csv" id="licence_adh_csv" required="required" value="">
  <br />

  <input class="btn btn-primary" type="submit" name="submit2" value="Vérifier">
  
</form>