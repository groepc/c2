<?php

namespace models\Authenticate;

class Authenticate {

    /**
     * Check if the user is authenticated
     * 
     * @return boolean when user is logged in otherwise redirect to login page
     */
    public static function isAuthenticated() {
        if (\helpers\session::get('login') === true) {
            return true;
        }
        \helpers\url::redirect('login');
    }

}
