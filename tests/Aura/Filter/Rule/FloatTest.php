<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class FloatTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_FLOAT';
    
    public function providerIs()
    {
        return array(
            array("+123456.7890"),
            array(12345.67890),
            array(-123456789.0),
            array(-123.4567890),
            array('-1.23'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(' '),
            array(''),
            array("-abc.123"),
            array("123.abc"),
            array("123,456"),
            array('00.00123.4560.00'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()), // can't fix
            array(123.45, true, 123.45),
            array('abc ... 123.45 ,.../', true, 123.450),
            array('a-bc .1. alkasldjf 23 aslk.45 ,.../', true, -.123450),
            array('1E5', true, 100000.0),
        );
    }
}
