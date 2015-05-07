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

        $array = $this->_db->select('SELECT planning.*, inschrijving.cijfer, '
                . "inschrijving.aanwezig, DATE_FORMAT(planning.datumtijd, '%d-%m-%Y %H:%i') datumeu FROM "
                . 'inschrijving  LEFT JOIN planning ON '
                . '(inschrijving.planningID=planning.id AND '
                . 'inschrijving.gebruikerID=:userID) JOIN tentamen ON (tentamen.code=planning.tentamenCode AND tentamen.cijferZichtbaar=1) WHERE '
                . 'inschrijving.gebruikerID=:userID ORDER BY '
                . 'planning.datumtijd DESC', array(':userID' => $userID));
        foreach ($array as $key => $item) {
            
            $array{$key}->cijfer = $item->cijfer;
            $array{$key}->uitgevoerd = (!empty($item->aanwezig)) ? 'Ja' : 'Nee';
        }

        return $array;
    }

}
