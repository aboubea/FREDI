<?php
/**
* Formulaire d'inscription d'un responsable legal
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
  <label for="mail_resp_leg">Mail :</label>
  <input type="text" name="mail_resp_leg" id="mail_resp_leg" value="">
  <br />
  <label for="mdp_resp_leg">Mot de passe :</label>
  <input type="password" name="mdp_resp_leg" id="mdp_resp_leg" value="">

  <br/>
  
  <input type="submit" name="submit" value="Se connecter">
</form>