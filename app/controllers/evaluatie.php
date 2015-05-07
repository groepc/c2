<?php

namespace controllers;

use core\view;
use models\Authenticate\Authenticate;
use models\Evaluatie\Evaluatie as model;

class Evaluatie extends \core\controller {

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
        $data['title'] = 'Evaluatie';

        $tentamenlijst = new model;

        $data['evaluaties'] = $tentamenlijst->getOpenEvaluaties(\helpers\session::get('userID'));

        View::rendertemplate('header', $data);
        View::render('evaluatie/index', $data);
        View::rendertemplate('footer', $data);
    }

    /**
     * Define Index page title and load template files
     */
    public function create($id, $code) {
        $data = ['code' => $code];
        $data['title'] = 'Evaluatie';
        $data['created'] = false;
        $tentamenlijst = new model;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $data['gebruikerID'] = \helpers\Session::get('userID');
            $data['created_at'] = date('Y-m-d H:i:s');
            $tentamenlijst->insertEvaluation($data);
            $data['created'] = true;
        }

        $data['alreadyCreated'] = $tentamenlijst->checkEvaluation(\helpers\Session::get('userID'), $code);

        
        View::rendertemplate('header', $data);
        View::render('evaluatie/create', $data);
        View::rendertemplate('footer', $data);
    }

}
