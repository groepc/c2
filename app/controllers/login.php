<?php

namespace controllers;

use core\view;

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
    public function subpage() {
        $data['title'] = $this->language->get('subpage_text');
        $data['welcome_message'] = $this->language->get('subpage_message');

        View::rendertemplate('header', $data);
        View::render('welcome/subpage', $data);
        View::rendertemplate('footer', $data);
    }

}
