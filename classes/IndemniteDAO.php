<?php

/**
 * Classe d'accès IndemniteDAO
 *
 * @author Paco
 */

class IndemniteDAO extends DAO
{
    // Créer l'indemnité de l'année en cours
    function insert($annee, $tarif_kilometrique)
    {
        $sql = "INSERT INTO indemnite (annee, tarif_kilometrique) VALUES (:annee, :tarif_kilometrique)";
        $params = array(
            ":annee"=>$annee,
            ":tarif_kilometrique"=>$tarif_kilometrique,
        );
        $sth = $this->executer($sql, $params);
        $nb = $sth->rowcount();

        // Retourne le nombre de mise à jour
        return $nb;
    }

    // Trouver l'indemnité de l'année en cours
    function findIndemnite()
    {
        $annee = date('Y');
        
        $sql = "SELECT * FROM indemnite WHERE annee = :annee_km ";
        $params = array(
            ":annee_km"=>$annee,
        );
        $sth = $this->executer($sql, $params);
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if ($row !== FALSE) {
            $indemnite = new Indemnite($row);
          } else {
            $indemnite = new Indemnite();
          }
        // Retourne l'objet métier
        return $indemnite;
    }

    // Mettre à jour l'indemnité de l'année en cours
    function update_frais($indemnite){
    $year = date('Y');
    $sql = "UPDATE indemnite SET tarif_kilometrique = :tarif_kilometrique WHERE annee = '$year' ";
    $params = array(
        ":tarif_kilometrique" => $indemnite->gettarif_kilometrique(),
    );
    $sth = $this->executer($sql,$params);
    $nb = $sth->rowcount();

    // Retourne le nombre de mise à jour
    return $nb;
    }

}

// Classe IndemniteDAO