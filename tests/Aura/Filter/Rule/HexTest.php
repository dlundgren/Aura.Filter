<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class HexTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_HEX';
    
    public function providerIs()
    {
        return array(
            array('abcdef'),
            array('01234f'),
            array('a1b2c3'),
            array('ffffff'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(""),
            array(' '),
            array("Seven 8 nine"),
            array("non:alpha-numeric's"),
            array(array()),
        );
    }
    
    public function providerFix()
    {
        return array(
            // value, result, expect
            array('$#% abc () 123 ,./', true, 'abc123'),
        );
    }
}
