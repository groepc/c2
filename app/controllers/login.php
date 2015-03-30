<?php

namespace controllers;

use \core\View;

class Login extends \core\controller {

    /**
     * Call the parent construct
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Define Index page title and load template files
     */
    public function index() {
        $data['title'] = 'Login';
        $error = \helpers\Session::pull('error');
        if ($error !== false) {
            $data['error'] = $error;
        }

        View::rendertemplate('header', $data);
        View::render('login/index', $data);
        View::rendertemplate('footer', $data);
    }

    /**
     * Define Subpage page title and load template files
     */
    public function process() {
        $login = new \models\Login\Login;
        $login->checkAuth($_POST['username'], $_POST['password']);
    }
    
    public function logout() {
        \helpers\session::destroy();
        \helpers\url::redirect('login');
    }

}