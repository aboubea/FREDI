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
<label for="licence_adh">Licence :</label>
  <input placeholder="Licence..." type="text" name="licence_adh" id="licence_adh" requiered="requiered" value="">
  <br />
  <label for="nom_adh">Nom :</label>
  <input placeholder="Nom..." type="text" name="nom_adh" id="nom_adh" requiered="requiered" value="">
  <br />
  <label for="prenom_adh">Prenom : </label>
  <input placeholder="Prenom..." type="text" name="prenom_adh" id="prenom_adh" requiered="requiered" value="">
  <br />
  <label for="sexe_adh">Selectionnez votre sexe :</label> 
  <select id="sexe_adh" name="sexe_adh" size="1"></br>
  <option value="F">Femme</option>
  <option value="H">Homme</option>
  </select>
  <br />
  <label for="date_naissance_adh">Date de naissance (xxxx/xx/xx) : </label>
  <input type="date" name="date_naissance_adh" id="date_naissance_adh" requiered="requiered" value="2018-11-26" min="1900-10-10" max="2018-11-26">
  <br />
  <label for="adresse_adh">Adresse :</label>
  <input placeholder="adresse..." type="text" name="adresse_adh" id="adresse_adh" requiered="requiered" value="">
  <br />
  <label for="cp_adh">Code postal :</label>
  <input placeholder="Code postal..." type="text" name="cp_adh" id="cp_adh" requiered="requiered" value="">
  <br />
  <label for="ville_adh">Ville :</label>
  <input placeholder="Ville..." type="ville_adh" name="ville_adh" id="ville_adh" requiered="requiered" value="">
  <br />
  <label for="mail_inscrit">Mail :</label>
  <input placeholder="mail@outlook.fr" type="email" name="mail_inscrit" id="mail_inscrit" requiered="requiered" value="">
  <br />
  <label for="mdp_inscrit">Mot de passe :</label>
  <input placeholder="******" type="password" name="mdp_inscrit" id="mdp_inscrit" requiered="requiered" value="">
  <br/>
  
  <label for="id_club">Club : </label>
  <select id="id_club" name="id_club"></br>
  
  <?php
  //Affiche la liste des clubs :
  foreach($clubs as $club){
    echo '<option value="'.$club->getId_club().'">'.$club->getLibelle_club().'</option>';
  }
  ?>

  </select>
  <br />
  
  <input type="submit" name="submit" value="S'inscrire">
  
</form>