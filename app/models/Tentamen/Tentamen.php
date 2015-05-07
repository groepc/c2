<?php

namespace models\Tentamen;

class Tentamen extends \core\model {

    /**
     * Haal de tentamenlijst op.
     * 
     * @return array tentamenlijst
     */
    public function getTentamens() {

        $array = $this->_db->select('SELECT *, '
                . "DATE_FORMAT(planning.datumtijd, '%d-%m-%Y %H:%i') datumeu "
                . 'FROM planning ORDER BY planning.datumtijd ASC');
        return $array;
    }

    /**
     * Haal de lijst met inschijvingen vanmde gebruiker op.
     * 
     * @return array lijst van inschrijvingen van de gebruiker
     */
    public function getInschrijvingen($userID) {

        $array = $this->_db->select('SELECT * '
                . 'FROM inschrijving '
                . 'WHERE gebruikerID=:userID ', array(':userID' => $userID));
        return $array;
    }

    /**
     * Schrijf de gebruiker in voor een tentamen
     */
    public function schrijfIn($userID, $tentamenID) {

        $array = $this->_db->select('SELECT datumtijd FROM planning WHERE ID=:ID ', array(':ID' => $tentamenID));
        $datumtijd = $array[0]->datumtijd;

        $result = $this->_db->select('SELECT * FROM inschrijving JOIN planning ON (planning.ID=inschrijving.planningID) WHERE :datumtijd BETWEEN planning.datumtijd AND  DATE_ADD(planning.datumtijd, INTERVAL 2 HOUR) AND inschrijving.gebruikerId=:userID', array(':userID' => $userID, ':datumtijd' => $datumtijd));

        if (!empty($result)) {
            return false;
        }

        $data = array(
            'planningID' => $tentamenID,
            'gebruikerID' => $userID,
            'datumtijd' => date('Y-m-d H:i:s')
        );

        $array = $this->_db->insert('inschrijving', $data);
        return true;
    }

    /**
     * Schrijf de gebruiker uit voor een tentamen
     */
    public function schrijfUit($userID, $tentamenID) {

        $data = array(
            'planningID' => $tentamenID,
            'gebruikerID' => $userID
        );

        $array = $this->_db->delete('inschrijving', $data);
    }

}
