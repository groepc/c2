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
                $result = $tentamen->schrijfIn(\helpers\session::get('userID'), $id);
                if ($result === false) {
                    \helpers\session::set('error', 'Je kunt je niet inschrijven voor dit tentamen omdat je al bent ingeschreven voor het zelfde tentamen of op de zelfde tijd');
                }
                \helpers\url::redirect('tentamens');
            } elseif ($type == 'uit') {
                $tentamen->schrijfUit(\helpers\session::get('userID'), $id);
                \helpers\url::redirect('tentamens');
            } else {
                $data['error'] = 'Er is iets fout gegaan, probeer opnieuw.';
            }
        }

        if (!empty(\helpers\Session::get('error'))) {
            $data['error'] = \helpers\Session::pull('error');
        }

        $data['tentamen'] = $tentamen->getTentamens();
        $data['inschrijving'] = $tentamen->getInschrijvingen(\helpers\session::get('userID'));

        View::rendertemplate('header', $data);
        View::render('tentamen/index', $data);
        View::rendertemplate('footer', $data);
    }

}
