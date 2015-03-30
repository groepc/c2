<?php

namespace controllers;

use core\view;
use models\Authenticate\Authenticate;
use models\Tentamen\Tentamen as tentamenlijstje;

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
		
        $tentamenlijst = new tentamenlijstje;
        $data['tentamen'] = $tentamenlijst->getTentamens();
        $data['inschrijving'] = $tentamenlijst->getInschrijvingen(\helpers\session::get('userID'));
        
        View::rendertemplate('header', $data);
        View::render('tentamen/index', $data);
        View::rendertemplate('footer', $data);
    }
}
