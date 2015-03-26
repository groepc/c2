<?php

namespace models\Cijferlijst;

class Cijferlijst extends \core\model {

    /**
     * Haal de cijferlijst op van de gebruiker.
     * 
     * @param int $userID userID van de gebruiker
     * @return array cijferlijst van de gebruiker
     */
    public function getCijferlijst($userID) {        

        return $this->_db->select('SELECT * FROM evaluatie WHERE gebruikerID=:userID', array(':userID' => $userID));
        
    } 

}