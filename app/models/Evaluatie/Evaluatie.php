<?php

namespace models\Evaluatie;

class Evaluatie extends \core\model {

    /**
     * Haal de tentamenlijst op.
     * 
     * @return array tentamenlijst
     */
    public function getOpenEvaluaties($userID) {
        $array = $this->_db->select('SELECT planning.*, inschrijving.cijfer, '
                . "inschrijving.aanwezig, DATE_FORMAT(planning.datumtijd, '%d-%m-%Y %H:%i') datumeu FROM "
                . 'inschrijving  LEFT JOIN planning ON '
                . '(inschrijving.planningID=planning.id AND '
                . 'inschrijving.gebruikerID=:userID) WHERE '
                . 'inschrijving.gebruikerID=:userID AND inschrijving.aanwezig=:one ORDER BY '
                . 'planning.datumtijd DESC', array(':userID' => $userID, ':one' => 1));
        return $array;
    }

    public function insertEvaluation($data) {
        $this->_db->insert('evaluatie', $data);
        return $this->_db->lastInsertId('ID');
    }

}
