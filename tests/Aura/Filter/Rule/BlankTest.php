<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class BlankTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_BLANK';
    
    public function providerIs()
    {
        return array(
            array(""),
            array(" "),
            array("\t"),
            array("\n"),
            array("\r"),
            array(" \t \n \r "),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(0),
            array(1),
            array('0'),
            array('1'),
            array("Seven 8 nine"),
            array("non:alpha-numeric's"),
            array('someThing8else'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array("",                true, null),
            array(" ",               true, null),
            array("\t",              true, null),
            array("\n",              true, null),
            array("\r",              true, null),
            array(" \t \n \r ",      true, null),
        );
    }
}
