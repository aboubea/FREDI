<?php

/**
 * Classe d'accès AdherentDAO
 *
 * @author Paco
 */

class NotefraisDAO extends DAO {

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

      /*function findAllbynotefraisid($id_note_frais) {
        $sql = "select * from note-frais where salesRepEmployeeNumber=:salesRepEmployeeNumber";
        $params = array(":salesRepEmployeeNumber" => $employeeNumber);
        $sth = $this->executer($sql, $params);
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        $tableau = array();
        foreach ($rows as $row) {
          $tableau[] = new Customers($row);
        }
        // Retourne un tableau d\'objet métier
        return $tableau;
      } */
    
    function insert($licence_adh){
        $sql = "insert into note_frais (licence_adh, annee) values (:licence_adh, YEAR(CURRENT_DATE))";

        $params = array(":licence_adh" => $licence_adh);
        $sth = $this->executer($sql, $params);
        $nb = $sth->rowcount();
        // Retourne le nombre de mise à jour
        return $nb;
  }

  function findbylicence($licence_adh)
{
  $sql ="select * from note_frais where licence_adh = :licence_adh";
  $params = array(":licence_adh" => $licence_adh);
  $sth = $this->executer($sql, $params);
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        $tableau = array();
        foreach ($rows as $row) {
          $tableau[] = new notefrais($row);
        }
        // Retourne un tableau d'objet métier
        return $tableau;
      }

    }