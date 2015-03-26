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
        $data['welcome_message'] = $this->language->get('welcome_message');

        View::rendertemplate('header', $data);
        View::render('welcome/welcome', $data);
        View::rendertemplate('footer', $data);
    }

    /**
     * Define Subpage page title and load template files
     */
    public function subpage() {
        $data['title'] = $this->language->get('subpage_text');
        $data['welcome_message'] = $this->language->get('subpage_message');

        View::rendertemplate('header', $data);
        View::render('welcome/subpage', $data);
        View::rendertemplate('footer', $data);
    }

}
