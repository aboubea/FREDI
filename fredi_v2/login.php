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

  <h2>Se connecter</h2>
  <br />
  <br />
  <form method="POST" action="testlog.php">
    <input id="in" type="text" name="pseudo" placeholder="Identifiant"></br></br>
    <input id="in" type="password" name="mdp" placeholder="Mot de Passe"></br></br>
    <input id="envoy" type="submit" value="Connexion">
  </form>
