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
    function findIndemnite($annee)
    {
        //$annee = date('Y');
        
        $sql = "SELECT * FROM indemnite WHERE annee =:annee";
        $params = array(":annee"=>$annee);
        $sth = $this->executer($sql, $params);
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $indemnite = new indemnite($row);
            // Retourne l'objet métier
            return $indemnite;
          } else {
            return NULL;
          }
    }

    // Mettre à jour l'indemnité de l'année en cours
    function updateTarif($indemnite){
    $sql = "UPDATE indemnite SET tarif_kilometrique = :tarif_kilometrique WHERE annee = :annee ";
    $params = array(
        ":tarif_kilometrique" => $indemnite->getTarif_kilometrique(),
        ":annee" => $indemnite->getAnnee(),
    );
    $sth = $this->executer($sql,$params);
    $nb = $sth->rowcount();

    // Retourne le nombre de mise à jour
    return $nb;
    }
}

// Classe IndemniteDAO