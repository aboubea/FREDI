<?php
class MotifDAO extends DAO {


function findAll(){
  $sql = "select * from motif";
  $sth = $this->executer($sql);
  $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
  $tableau = array();
  foreach ($rows as $row) {
    $tableau[] = new motif($row);
  }
  // Retourne un tableau d'objet métier
  return $tableau;
}

/*function find($id_ligne){
  $sql = "select * from ligne_frais where id_ligne_frais= :id_ligne";
  $params = array(":id_ligne" => $id_ligne);
  $sth = $this->executer($sql, $params);
  $row = $sth->fetch(PDO::FETCH_ASSOC);
  if ($row !==FALSE) {
    $lignefrais = new lignefrais($row);
  } else {
    $lignefrais = new lignefrais();
  }
  // Retourne l'objet métier
  return $lignefrais;
}*/

}
