<?php

namespace controllers;

use core\view;
use models\Authenticate\Authenticate;

class Welcome extends \core\controller {

    /**
     * Call the parent construct
     */
    public function __construct() {
        Authenticate::isAuthenticated();
        parent::__construct();

        $this->language->load('welcome');
    }

    /**
     * Define Index page title and load template files
     */
    public function index() {
        $data['title'] = 'Dashboard';
        
		$data['name'] = \helpers\session::get('name');

        View::rendertemplate('header', $data);
        View::render('welcome/welcome', $data);
        View::rendertemplate('footer', $data);
    }
}
