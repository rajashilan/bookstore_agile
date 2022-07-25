<?php
class LoginCest 
{    
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
    }

    public function loginSuccessfully(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'user@gmail.com');
        $I->fillField('password', 'password');
        $I->click('Login');
        $I->amOnPage('/home');
    }
    
    public function loginWithInvalidPassword(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'user@gmail.com');
        $I->fillField('password', 'passw0rd');
        $I->click('Login');
        $I->amOnPage('/login');
    }       
}