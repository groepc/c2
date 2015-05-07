<?php

namespace controllers;

use core\view;
use models\Authenticate\Authenticate;
use models\Tentamen\Tentamen as tentamentje;

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
		
		$tentamen = new tentamentje;
		$data['tentamen'] = $tentamen->getTentamens();
		$data['inschrijving'] = $tentamen->getInschrijvingen(\helpers\session::get('userID'));

		View::rendertemplate('header', $data);
		View::render('welcome/welcome', $data);
		View::rendertemplate('footer', $data);
	}
}
