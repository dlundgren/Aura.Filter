<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class EmailTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_EMAIL';
    
    public function providerIs()
    {
        return array(
            array("pmjones@solarphp.net"),
            array("no.body@no.where.com"),
            array("any-thing@gmail.com"),
            array("any_one@hotmail.com"),
            array("nobody1234567890@yahoo.co.uk"),
            array("something+else@example.com"),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array("something @ somewhere.edu"),
            array("the-name.for!you"),
            array("non:alpha@example.com"),
            array(""),
            array("\t\n"),
            array(" "),
        );
    }
    
    public function providerFix()
    {
        return array(
            array("non:alpha@example.com", false, "non:alpha@example.com"), // can't fix
        );
    }
}
