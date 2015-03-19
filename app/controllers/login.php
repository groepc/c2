<?php

namespace controllers;

use core\view;
use models\Login\Login as loginHandler;

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
        $data['title'] = 'Aanmelden studenten';

        View::rendertemplate('header', $data);
        View::render('login/index', $data);
        View::rendertemplate('footer', $data);
    }

    /**
     * Define Subpage page title and load template files
     */
    public function process() {
        $login = new LoginHandler;
        $login->checkAuth(1,1);

    }

}
