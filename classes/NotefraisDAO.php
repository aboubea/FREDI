<?php

/**
 * Classe d'accès AdherentDAO
 *
 * @author Paco
 */

class NotefraisDAO extends DAO {

    function findby($mail_inscrit){
        $sql = "select id_note_frais, note_frais.licence_adh, id_ligne_frais
                from note_frais, adherent
                where adherent.licence_adh = :licence_adh
                AND adherent.licence_adh = note_frais.licence_adh

        id_adh=:id_adh";
    $params = array(":id_adh" => $id_adh);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    //TODO : si le fetch ne retourne rien, $row=false et ça plante l'hydrateur
    $adherent = new Adherent($row);
    // Retourne l'objet métier
    return $adherent;
  }
    }
}