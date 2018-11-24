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
            Entrez votre pseudo: <input id="in" type="text" name="PS">
            </br>
            Entrez votre mot de passe: <input id="in" type="text" name="MDP">
            </br>
            Comfirmez votre mot de passe: <input id="in" type="text" name="MDP1">
			      </br>
            Entrez votre mail: <input id="in" type="text" name="MA">
            </br>
            <input id="envoy" type="submit" value="Inscription"/>

        </form>

    </div>
