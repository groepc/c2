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
                . 'FROM planning ');
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
		
		$data = array(			
			'planningID' => $tentamenID,
			'gebruikerID' => $userID,
			'datumtijd' => now()			
		);
		
		$array = $this->_db->insert(PREFIX.'inschrijving', $data);
		
	}
}
