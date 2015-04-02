<?php

class UserTest extends PHPUnit_Framework_TestCase {

    public function testUserCanLogin() {
        $u = new \models\Login;
        $assertion = $u->checkAuth('perryfaro@live.nl', 'Demo1234', true);
        $this->assertTrue($assertion);
    }
    
    public function testUserUseWrongCreditals() {
        $u = new \models\Login;
        $assertion = $u->checkAuth('perryfaro@live.n', 'Demo1234', true);
        $this->assertFalse($assertion);
    }

}