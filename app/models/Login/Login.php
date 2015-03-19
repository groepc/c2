<?php

namespace models\Login;

/**
 * Handle all login requests
 */
class Login extends Model {

    /**
     * Check if the login is oke
     * 
     * @param string $username username for the application
     * @param string $password password that belongs to the username
     * @return boolean true login everything is oke false when there is something wrong
     */
    public function checkAuth($username, $password) {

        $password = md5($password);
        $result = $this->_db->select('SELECT * FROM gebruikers WHERE gebruikersnaam=:username AND password=:password', array(':username' => $username, ':passsword' => $password));
        if (!empty($result)) {
            \helpers\session::set('idAuthorize', 1);
            \helpers\session::set('login', true);
            \helpers\session::set('name', $result['voornaam'] . ' ' . $result['']);
            
        }
    }

}