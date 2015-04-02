<?php

namespace models\Login;

/**
 * Handle all login requests
 */
class Login extends \core\model {

    /**
     * Check if the login is oke
     * 
     * @param string $username username for the application
     * @param string $password password that belongs to the username
     * @return boolean true login everything is oke false when there is something wrong
     */
    public function checkAuth($username, $password, $unitTest = false) {

        $password = md5($password);
        $result = $this->_db->select('SELECT * FROM gebruiker WHERE gebruikersnaam=:username AND wachtwoord=:password', array(':username' => $username, ':password' => $password));

        if ($unitTest === true) {
            if (!empty($result)) {
                return true;
            } else {
                return false;
            }
        }
        if (!empty($result)) {
            \helpers\session::set('idAuthorize', 1);
            \helpers\session::set('login', true);

            \helpers\session::set('userID', $result[0]->ID);
            \helpers\session::set('name', $result[0]->voornaam . ' ' . $result[0]->tussenvoegsel . ' ' . $result[0]->achternaam);
            \helpers\session::set('rol_id', $result[0]->rolID);
            \helpers\url::redirect('');
        } else {
            \helpers\session::set('error', 'Gebruikersnaam of wachtwoord onjuist');
            \helpers\url::redirect('login');
        }
    }

}
