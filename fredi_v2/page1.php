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

<h2>Bienvenue sur notre Espace adhérents !</h2>

<p>Vous etes adhérents et vous souhaiter vous : </p>
<ul>
  <li><a href ="login.php">Connecter</a></li>
<li><a href="register.php">Inscrire</a></li>
</ul>
</br>
<p>Revenir à la <a href="index.php">page principale</a></p>



</body>
</html>
