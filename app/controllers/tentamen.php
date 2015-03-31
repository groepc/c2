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
    public function index($type = false, $id = false) {
        $data['title'] = 'Tentamen overzicht';
		
        $tentamen = new tentamentje;
		$data['error'] = '';
		
		if ($type !== false && $id !== false) {
			
			if ($type == 'in') {
				$tentamen->schrijfIn(\helpers\session::get('userID'), $id);
			} elseif ($type == 'uit') {
				$tentamen->schrijfUit(\helpers\session::get('userID'), $id);
			} else {
				$data['error'] = 'Er is iets fout gegaan, probeer opnieuw.';
			}
		}
		
        $data['tentamen'] = $tentamen->getTentamens();
        $data['inschrijving'] = $tentamen->getInschrijvingen(\helpers\session::get('userID'));
        
        View::rendertemplate('header', $data);
        View::render('tentamen/index', $data);
        View::rendertemplate('footer', $data);
    }
	
	
}
