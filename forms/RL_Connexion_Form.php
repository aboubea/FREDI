<?php
/**
* Formulaire d'inscription d'un responsable legal
*
*/

// Si l'action n'est pas fournie, on la crée avec la valeur par défaut (le formulaire s'appelle lui-même)
if (!isset($action)) {
  $action = '#';
}

?>
<form align="center" action="<?php echo $action; ?>" method="post">
  <label for="mail_inscrit">Mail :</label>
  <input type="text" name="mail_inscrit" id="mail_inscrit" value="">
  <br />
  <label for="mdp_inscrit">Mot de passe :</label>
  <input type="text" name="mdp_inscrit" id="mdp_inscrit" value="">

  <br/>
  
  <input type="submit" name="submit" value="Se connecter">
</form>