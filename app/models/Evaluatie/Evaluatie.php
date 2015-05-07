<?php

namespace models\Evaluatie;

class Evaluatie extends \core\model {

    /**
     * Haal de tentamenlijst op.
     * 
     * @return array tentamenlijst
     */
    public function getOpenEvaluaties($userID) {
        $array = $this->_db->select('SELECT DISTINCT planning.*, inschrijving.cijfer, '
                . "inschrijving.aanwezig, DATE_FORMAT(planning.datumtijd, '%d-%m-%Y %H:%i') datumeu,"
                . "evaluatie.created_at eca FROM inschrijving  LEFT JOIN planning ON "
                . '(inschrijving.planningID=planning.id AND '
                . 'inschrijving.gebruikerID=:userID) '
                . 'LEFT JOIN evaluatie ON (evaluatie.gebruikerID=:userID AND evaluatie.tentamenCode=planning.tentamenCode) '
                . ' WHERE '
                . 'inschrijving.gebruikerID=:userID AND inschrijving.aanwezig=:one ORDER BY '
                . 'planning.datumtijd DESC', array(':userID' => $userID, ':one' => 1));
        return $array;
    }

    public function checkEvaluation($idUser, $code) {
        $result = $this->_db->select("SELECT *, DATE_FORMAT(created_at, '%d-%m-%Y') datumeu, DATE_FORMAT(created_at, '%H:%i') insertTime  FROM evaluatie WHERE gebruikerID=:id AND tentamenCode=:code LIMIT 1", array(':id' => $idUser, ':code' => $code));
        if (!empty($result)) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function insertEvaluation($data) {
        $this->_db->insert('evaluatie', $data);
        return $this->_db->lastInsertId('ID');
    }

}
