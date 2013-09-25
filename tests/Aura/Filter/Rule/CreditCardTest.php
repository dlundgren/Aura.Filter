<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class CreditCardTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_CREDIT_CARD';
    
    public function providerIs()
    {
        // stolen from Respect Validate testing
        return array(
            array('5376 7473 9720 8720'), // MasterCard
            array('4024.0071.5336.1885'), // Visa 16
            array('4024 007 193 879'), // Visa 13
            array('340-3161-9380-9364'), // AmericanExpress
            array('30351042633884'), // Dinners
        );
    }
    
    public function providerIsNot()
    {
        // stolen from Respect Validate testing
        return array(
            array(''),
            array('it isnt my credit card number'),
            array('&stR@ng3|] [|-|@r$'),
            array(''),
            array('1234 1234 1234 1234'),
            array('1234.1234.1234.1234'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array('bad', false, 'bad'), // cannot fix
        );
    }
}
