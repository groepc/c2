<?php

namespace controllers;

use core\view;
use models\Authenticate\Authenticate;
use models\Cijferlijst\Cijferlijst as cijferlijstje;

class Cijferlijst extends \core\controller {

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
        $data['title'] = 'Cijferlijst';
		
        $cijferlijst = new cijferlijstje;
        $data['cijferlijst'] = $cijferlijst->getCijferlijst(\helpers\session::get('userID'));
        
		//print_r($data['cijferlijst']);
		//die;
		
        View::rendertemplate('header', $data);
        View::render('cijferlijst/index', $data);
        View::rendertemplate('footer', $data);
    }
}
