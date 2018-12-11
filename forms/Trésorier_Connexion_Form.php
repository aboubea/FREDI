<?php
/**
* Formulaire d'inscription d'un adhérent
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
  <label for="mail_tresorier">Mail :</label>
  <input type="text" name="mail_tresorier" id="mail_tresorier" value="">
  <br />
  <label for="mdp_tresorier">Mot de passe :</label>
  <input type="password" name="mdp_tresorier" id="mdp_tresorier" value="">

  <br/>
  
  <input type="submit" name="submit" value="Se connecter">
</form>