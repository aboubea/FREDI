<?php

/**
 * Classe d'accès AdherentDAO
 *
 * @author Paco
 */

class NotefraisDAO extends DAO {

    function insert(){
        $sql = "insert into note_frais (licence_adh, id_ligne_frais) values (:licence_adh, id_ligne_frais)"
    $params = array(
        ":licence_adh" => $licence_adh,
        ":id_ligne_frais" => $id_ligne_frais
);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    //TODO : si le fetch ne retourne rien, $row=false et ça plante l'hydrateur
    $adherent = new Adherent($row);
    // Retourne l'objet métier
    return $adherent;
  }
    }
}