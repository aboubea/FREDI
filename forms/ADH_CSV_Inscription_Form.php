<?php
/**
* Formulaire Adherents CSV
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
<label for="licence_adh">Licence :</label>
  <input placeholder="Ex. : 170540010556" type="text" name="licence_adh" id="licence_adh" required="required" value="<?php echo $adherent_csv->getLicence_adh_csv(); ?>">
  <br />
  <label for="nom_adh">Nom :</label>
  <input placeholder="Ex. : Jean" type="text" name="nom_adh" id="nom_adh" required="required" value="<?php echo $adherent_csv->getNom_adh_csv(); ?>">
  <br />
  <label for="prenom_adh">Prenom : </label>
  <input placeholder="Ex. : Bonneau" type="text" name="prenom_adh" id="prenom_adh" required="required" value="<?php echo $adherent_csv->getPrenom_adh_csv(); ?>">
  <br />
  <label for="sexe_adh">Selectionnez votre sexe :</label> 
  <select id="sexe_adh" name="sexe_adh" size="1" >
  <?php 
  $sexe = $adherent_csv->getSexe_adh_csv();
  if ($sexe === "M"){
    echo '<option value="F">Femme</option>';
    echo '<option selected="selected" value="H">Homme</option>';
  }elseif($sexe === "F"){
    echo '<option selected="selected" value="F">Femme</option>';
    echo '<option value="H">Homme</option>';
  }else{
  ?>
  <option value="F">Femme</option>
  <option value="H">Homme</option>
  <?php } ?>
  </select>
  <br />
  <label for="date_naissance_adh">Date de naissance (xxxx/xx/xx) : </label>
  <input type="date" name="date_naissance_adh" id="date_naissance_adh" required="required" value="<?php echo $adherent_csv->getDate_naissance_adh_csv(); ?>">
  <br />
  <label for="adresse_adh">Adresse :</label>
  <input placeholder="Ex. : 2, rue Picot" type="text" name="adresse_adh" id="adresse_adh" required="required" value="<?php echo $adherent_csv->getAdresse_adh_csv(); ?>">
  <br />
  <label for="cp_adh">Code postal :</label>
  <input placeholder="Ex. : 31400" type="text" name="cp_adh" id="cp_adh" required="required" value="<?php echo $adherent_csv->getCp_adh_csv(); ?>">
  <br />
  <label for="ville_adh">Ville :</label>
  <input placeholder="Ex. : Toulouse" type="ville_adh" name="ville_adh" id="ville_adh" required="required" value="<?php echo $adherent_csv->getVille_adh_csv(); ?>">
  <br />
  <label for="mail_inscrit">Mail :</label>
  <input placeholder="mail@outlook.fr" type="email" name="mail_inscrit" id="mail_inscrit" required="required" value="">
  <br />
  <label for="mdp_inscrit">Mot de passe :</label>
  <input placeholder="******" type="password" name="mdp_inscrit" id="mdp_inscrit" required="required" value="">
  <br/>
  
  <label for="id_club">Club : </label>
  <select id="id_club" name="id_club">
  
  <?php
  //Affiche la liste des clubs :
  foreach($clubs as $club){
    echo '<option value="'.$club->getId_club().'">'.$club->getLibelle_club().'</option>';
  }
  ?>

  </select>
  <br />
  
  <input class="btn btn-primary" type="submit" name="submit" value="S'inscrire">
  
</form>