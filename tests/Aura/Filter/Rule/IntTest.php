<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class IntTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_INT';
    
    public function providerIs()
    {
        return array(
            array("+1234567890"),
            array(1234567890),
            array(-123456789.0),
            array(-1234567890),
            array('-123'),
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
            array('0000123.456000'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()), // cannot sanitize
            array('abc ... 123.45 ,.../', true, 12345),
            array('a-bc .1. alkasldjf 23 aslk.45 ,.../', true, -12345),
            array('1E5', true, 100000),
        );
    }
}
