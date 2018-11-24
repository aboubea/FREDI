<?php
if (!empty($_SESSION)) {
echo "<p>Bienvenue sur notre FREDI <strong><i>". $_SESSION['pseudo']."</i></strong> </p>";
} else
{
	echo "<h1>Bienvenue sur notre FREDI </h1>";
}
 ?>
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
