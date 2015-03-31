<?php

namespace controllers;

use core\view;
use models\Authenticate\Authenticate;
use models\Tentamen\Tentamen as tentamentje;

class Tentamen extends \core\controller {

    /**
     * Call the parent construct
     */
    public function __construct() {
        Authenticate::isAuthenticated();
        parent::__construct();
    }

    /**
     * Define Index page title and load template files
     */
    public function index() {
        $data['title'] = 'Tentamen overzicht';
		
        $tentamen = new tentamentje;
        $data['tentamen'] = $tentamen->getTentamens();
        $data['inschrijving'] = $tentamen->getInschrijvingen(\helpers\session::get('userID'));
        
        View::rendertemplate('header', $data);
        View::render('tentamen/index', $data);
        View::rendertemplate('footer', $data);
    }
}
