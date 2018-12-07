<?php
class lignefraisDAO extends DAO {


function findAll(){
  $sql = "select * from ligne_frais";
  $sth = $this->executer($sql);
  $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
  $tableau = array();
  foreach ($rows as $row) {
    $tableau[] = new lignefrais($row);
  }
  // Retourne un tableau d'objet métier
  return $tableau;
}

function find($id_ligne){
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
}

function insert($date_frais,$trajet_frais,$km_parcourus, $cout_peage, $cout_repas, $cout_hebergement, $Id_motif){
  $sql = "insert into ligne_frais(date_frais, trajet_frais, km_parcourus, cout_peage, cout_repas, cout_hebergement, Id_motif) values (:date_frais, :trajet_frais, :km_parcourus, :cout_peage, :cout_repas, :cout_hebergement, :Id_motif)";
    $params = array(
      ":date_frais" => $date_frais,
      ":trajet_frais" => $trajet_frais,
      ":km_parcourus" => $km_parcourus,
      ":cout_peage" => $cout_peage,
      ":cout_repas" => $cout_repas,
      ":cout_hebergement" => $cout_hebergement,
      ":Id_motif" => $Id_motif
    );
    $sth = $this->executer($sql,$params);
    $nb = $sth->rowcount();
    // Retourne le nombre de mise à jour
    return $nb;
}
/*function delete($id_ligne){
  $sql = "delete from ligne_frais where id_ligne_frais= :id_ligne";
    $params = array(":id_ligne" => $id_ligne);
    $sth = $this->executer($sql,$params);
    $nb = $sth->rowcount();
    // Retourne le nombre de mise à jour
    return $nb;
}


function update_frais($lignefrais){
  $sql = "update_frais ligne_frais set date_frais_frais= :date_frais,trajet_frais= :trajet_frais, km_parcourus = :km_parcourus, cout_peage= :cout_peage,cout_repas= :cout_repas,cout_hebergement= :cout_hebergement, annee= :date_frais";
  $params = array(
    ":date_frais" => $lignefrais->getdate_frais(),
    ":trajet_frais" => $lignefrais->gettrajet_frais(),
    ":km_parcourus" => $lignefrais->getkm_parcourus(),
    ":cout_peage" => $lignefrais->getCout_peage(),
    ":cout_repas" => $lignefrais->getCout_repas(),
    ":cout_hebergement" => $lignefrais->getCout_hebergement(),
    ":annee" => $lignefrais->getdate_frais(),
  );
  $sth = $this->executer($sql,$params);
  $nb = $sth->rowcount();
  // Retourne le nombre de mise à jour
  return $nb;
}*/
}
