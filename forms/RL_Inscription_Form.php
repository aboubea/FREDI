<?php
/**
* Formulaire d'inscription d'un Responsable legal
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

if (isset($message)) {   
  //Si un message est créée, elle s'affichera ici
  echo $message;
}
?>

<form align="center" action="<?php echo $action; ?>" method="post">
  <label for="nom_resp_leg">Nom :</label>
  <input placeholder="Nom..." type="text" name="nom_resp_leg" id="nom_resp_leg" required="required" value="">
  <br />
  <label for="prenom_resp_leg">Prenom : </label>
  <input placeholder="Prenom..." type="text" name="prenom_resp_leg" id="prenom_resp_leg" required="required" value="">
  <br />
  <label for="rue_resp_leg">Rue :</label>
  <input placeholder="Rue..." type="text" name="rue_resp_leg" id="rue_resp_leg" required="required" value="">
  <br />
  <label for="cp_resp_leg">Code postal :</label>
  <input placeholder="Code postal..." type="text" name="cp_resp_leg" id="cp_resp_leg" required="required" value="">
  <br />
  <label for="ville_resp_leg">Ville :</label>
  <input placeholder="Ville..." type="ville_resp_leg" name="ville_resp_leg" id="ville_resp_leg" required="required" value="">
  <br />
  <label for="mail_resp_leg">Mail :</label>
  <input placeholder="mail@outlook.fr" type="email" name="mail_resp_leg" id="mail_resp_leg" required="required" value="">
  <br />
  <label for="mdp_resp_leg">Mot de passe :</label>
  <input placeholder="******" type="password" name="mdp_resp_leg" id="mdp_resp_leg" required="required" value="">

  <br />
  
  <input class="btn btn-primary" type="submit" name="submit" value="S'inscrire">
  
</form>