<?php

use \app\common\enums\ErrorResponse;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class calculateFormCest
{

    public function _before(\FunctionalTester $I)
    {
        $I->amOnPage(['/']);
    }

    public function tryEmpty(FunctionalTester $I)
    {
        $I->fillField('number1', '');
        $I->fillField('number2', '4');
        $I->click('Calculate');
        $I->see(ErrorResponse::$EMPTY_PARAM->getTitle(), '#result');
    }

    public function tryDivideZero(FunctionalTester $I)
    {
        $I->submitForm('.__form', array(
            'number1' => '15',
            'number2' => '0',
            'operation_id' => '3',
            'submitButton' => 'Calculate',
        ));
        $I->see(ErrorResponse::$DIVIDE_BY_ZERO->getTitle(), '#result');
    }

    public function tryUndefineOperation(FunctionalTester $I)
    {
        $I->submitForm('.__form', array(
            'number1' => '1',
            'number2' => '5',
            'operation_id' => '4',
            'submitButton' => 'Calculate',
        ));
        $I->see(ErrorResponse::$UNDEFINED_METHOD->getTitle(), '#result');
    }

    public function tryPlus(FunctionalTester $I)
    {
        $I->submitForm('.__form', array(
            'number1' => '-1',
            'number2' => '4',
            'operation_id' => '0',
            'submitButton' => 'Calculate',
        ));
        $I->see('-1 + 4 = 3', '#result');
    }

    public function tryMinus(FunctionalTester $I)
    {
        $I->submitForm('.__form', array(
            'number1' => '5',
            'number2' => '2',
            'operation_id' => '1',
            'submitButton' => 'Calculate',
        ));
        $I->see('5 - 2 = 3', '#result');
    }

    public function tryTimes(FunctionalTester $I)
    {
        $I->submitForm('.__form', array(
            'number1' => '5',
            'number2' => '100',
            'operation_id' => '2',
            'submitButton' => 'Calculate',
        ));
        $I->see('5 * 100 = 500', '#result');
    }

    public function tryDivide(FunctionalTester $I)
    {
        $I->submitForm('.__form', array(
            'number1' => '10',
            'number2' => '3',
            'operation_id' => '3',
            'submitButton' => 'Calculate',
        ));
        $I->see('10 / 3 = 3.3', '#result');
    }

}
