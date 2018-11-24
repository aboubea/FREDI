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
    <input id="" type="text" name="" placeholder="Identifiant"></br></br>
    <input id="" type="password" name="" placeholder="Mot de Passe"></br></br>
    <input id="" type="submit" value="Connexion">
  </form>
</br>
  <p>Revenir à la <a href="page1.php">page précédente</a></p>
