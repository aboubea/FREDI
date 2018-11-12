<?php
/**
* Classe de l'application MVC
*
* @author Paco
*/
require_once SRC . DS . 'framework' . DS . 'Request.php';

class App {

  protected $controller_name;       // Nom du contrôleur
  protected $controller;            // L'objet contrôleur
  protected $action_name;           // Nom de l'action (ou méthode)
  protected $params = [];           // Liste des paramètres passés dans l'URL
  protected $request;               // l'objet qui correspond à la requête HTTP

  const DEFAULT_CONTROLLER_NAME = 'home';  // Nom du contrôleur par défaut
  const DEFAULT_ACTION_NAME = 'index';     // Nom de l'action par défaut

  /**
  * Constructeur
  * Route la requête vers le contrôleur et lui transmet les données fournies
  * L'URL est de la forme : index.php?url=contrôleur/action/param1/param2/param3/...
  */
  public function __construct() {

    // Parse l'URL
    $url = $this->parse_URL();

    // Détermine le contrôleur
    if (!isset($url[0])) {
      $url[0] = self::DEFAULT_CONTROLLER_NAME;
    }
    $this->controller_name = $url[0] . "Controller";  // Met en forme le nom du contrôleur dans l'application

    // Vérifie que le contrôleur existe dans l'application
    if (!file_exists(SRC . DS . 'controllers/' . $this->controller_name . '.php')) {
      throw new Exception("Erreur, le contrôleur " . $this->controller_name . " n'existe pas");
    }

     // Instancie l'objet request en collectant tout ce qui est passé en GET et POST + nom du contrôleur + nom de l'action + url
    $this->request = new Request();
    $this->request->set_params(array_merge($_GET, $_POST));
    $this->request->set('controller', $this->controller_name);
    $this->request->set('action', $this->action_name);
    $this->request->set('url', $url);  // Tableau correspondant à l'URL parsée

    // Instancie le contrôleur
    require_once SRC . DS . 'controllers/' . $this->controller_name . '.php';
    $this->controller = new $this->controller_name;

    // Détermine la méthode/action
    if (!isset($url[1])) {
      $url[1] = self::DEFAULT_ACTION_NAME;
    }
    $this->action_name = $url[1];

    // Vérifie que la méthode/action existe dans le contrôleur
    if (!method_exists($this->controller, $this->action_name)) {
      throw new Exception("Erreur, la méthode " . $this->action_name . " n'existe pas dans le contrôleur " . $this->controller_name);
    }

    // Extrait uniquement les paramètres
    $this->params = $url ? array_values($url) : []; // retourne uniquement les valeurs de l'array et les indexe avec des entiers
    array_shift($this->params);   // Enlève le nom du contrôleur
    array_shift($this->params);   // Enlève le nom de l'action
    // Fournit au contrôleur la request
    $this->controller->set_request($this->request);

    // Appelle la méthode du contrôleur
    call_user_func_array(array($this->controller, $this->action_name), $this->params);
  }

  // __construct

  /**
  * Parse l'URL
  * @return string URL parsée sous la forme d'un tableau indicé
  */
  public function parse_URL() {
    $tableau = array();
    if (isset($_GET['url'])) {
      $tableau = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
    return $tableau;
  }

}
