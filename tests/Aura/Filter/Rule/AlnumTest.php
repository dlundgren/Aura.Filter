<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class AlnumTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_ALNUM';
    
    public function providerIs()
    {
        return array(
            array(0),
            array(1),
            array(2),
            array(5),
            array('0'),
            array('1'),
            array('2'),
            array('5'),
            array('alphaonly'),
            array('AlphaOnLy'),
            array('someThing8else'),
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
