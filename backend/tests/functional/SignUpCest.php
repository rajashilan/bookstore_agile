<?php

class SignUpCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/register');
    }

    // tests
    public function tryToSignUpTest(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->fillField('name', 'user1');
        $I->fillField('email', 'user1@gmail.com');
        $I->fillField('password', 'password');
        $I->fillField('password_confirmation', 'password');
        $I->click('Register');
        $I->amOnPage('/home');
    }

    public function signupFailed(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->fillField('name', '');
        $I->fillField('email', '');
        $I->fillField('password', '');
        $I->fillField('password_confirmation', '');
        $I->click('Register');
        $I->amOnPage('/register');
        $I->see('Register');
    }
}
