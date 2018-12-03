<<<<<<< HEAD:register.php
<center>
<h1>Inscription</h1>
            
    
        <form action="testp01.php" method="POST">

            </br>
            Entrez votre pseudo: <input id="in" type="text" name="PS">
            </br>
            Entrez votre mot de passe: <input id="in" type="text" name="MDP">
            </br>
			Comfirmez votre mot de passe: <input id="in" type="text" name="MDP1">
			</br>
            Entrez votre mail: <input id="in" type="text" name="MA">
            </br>
            Selectionnez votre ligue: <select id="in" name="ligue" size="1"></br>
                <option value="1">Football</option>
                <option value="2">Pétanque</option>
                <option value="3">Judo</option>

            </select>

            <select style="display:none;" id="in" name="TU" size="1"></br>
                <option value="1">normal</option>

            </select>
            </br>


            <input id="envoy" type="submit" value="OK"/>

        </form>


    </center>

    </div>
=======
<?php
//
// PPE Projet FREDI
//
include 'src/config/init.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo APPLINAME ; ?></title>
<link rel="stylesheet" type="text/css" href="src/css/styles.css" />
</head>
<body>
<h1><?php echo APPLINAME ; ?></h1>

<h2>S'Inscrire</h2>
<form action="testp01.php" method="POST">
            Entrez votre nom : <input id="" type="text" name="">
            </br>
            Entrez votre prénom : <input id="" type="text" name="">
            </br>
            Entrez votre sexe : <select id="in" name="ligue" size="1"></br>
                <option value="1">Femme</option>
                <option value="2">Homme</option>
            </select>
            </br>
			      </br>
            Entrez votre date de naissance : <input id="" type="text" name="">
            </br>
            Entrez votre adresse postale : <input id="" type="text" name="">
            </br>
            Entrez votre code postal : <input id="" type="text" name="">
            </br>
            Entrez votre ville : <input id="" type="text" name="">
            </br>
            Entrez votre adresse mail : <input id="" type="text" name="">
            </br>
            Entrez votre mot de passe : <input id="" type="password" name="">
            </br>
            Re-saisissez votre mot de passe : <input id="" type="password" name="">
            </br>

            <input id="" type="submit" value="Inscription"/>

        </form>
</br>
<p>Revenir à la <a href="page1.php">page précédente</a></p>
>>>>>>> c101d60ba298cb9282dda5e262d8181311a07888:fredi_v2/register.php
