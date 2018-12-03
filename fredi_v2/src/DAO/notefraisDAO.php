<?php
class notefraisDAO extends DAO {

  function findAll(){
    $sql = "select * from note_frais";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new notefrais($row);
    }
    // Retourne un tableau d'objet métier
    return $tableau;
  }

  function find($id_note){
    $sql = "select * from note_frais where id_note_frais = :id_note";
$params = array("id_note" => $id_note);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $notefrais = new notefrais($row);
    } else {
      $notefrais = new notefrais();
    }
    // Retourne l'objet métier
    return $notefrais;
  }


/* ???????????????????????????

  function insert($notefrais){
      $sql = "insert into note_frais () VALUES ()";
      $sth = $this->executer($sql);
      $nb = $sth->rowcount();
      // Retourne le nombre de mise à jour
      return $nb;
  }

?????????????????????????? */ 


  function delete($id_note){
    $sql = "delete from note_frais where id_note_frais= :id_note";
      $params = array(":id_note" => $id_note);
      $sth = $this->executer($sql,$params);
      $nb = $sth->rowcount();
      // Retourne le nombre de mise à jour
      return $nb;
  }
}
 ?>
