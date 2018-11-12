<?php
/*
* Classe modélisant une requête HTTP entrante
* Elle contient tout ce qui passe en GET, POST ainsi que le nom du contrôleur, l'action et les paramètres passés dans l'URL
* @author J.F. Ramiara
*/

class Request {

  private $params=array(); // Tableau des paramètres de la requête

  /**
  * Ajoute un paramètre dans la requête
  * @param string $key
  * @param mixed $value
  */
  public function set($key, $value=NULL) {
    $this->params[$key] = $value;
  }

  /**
  * Lit un paramètre dans la requête
  * @param string la clé du paramètre
  * @return mixed la valeur du paramètre ou NULL si elle n'existe pas
  */
  public function get($key) {
    if (isset($this->params[$key])) {
      $value = $this->params[$key];
    }  else {
      $value = NULL;
    }
    return $value;
  }

  /**
  * Indique si un paramètre existe dans la requête
  * @param string $key
  * @return boolean true = le paramètre existe
  */
  public function exists($key)  {
    return isset($this->params[$key]);
  }

  /**
  * Initialise le tableau des paramètres de la requête
  * @param array $params
  */
  public function set_params(array $params) {
    $this->params = $params;
  }

  /**
  * Renvoie le tableau des paramètres de la requête
  * @return array Tableau des paramètres
  */
  private function get_params() {
    return $this->params;
  }

}

// classe Request
