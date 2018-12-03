<?php

/**
 * Classe d'accès ClubDAO
 *
 * @author Paco
 */

class ClubDAO extends DAO
{
    function findAllClubs()
    {
        $sql = "select * from club";
        $sth = $this->executer($sql);
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        $tableau = array();
        foreach ($rows as $row) {
            $tableau[] = new Club($row);
        }
        // Retourne un tableau d'objets métier
        return $tableau;
    }
}

// Classe ClubDAO