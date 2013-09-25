<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class LocaleTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_LOCALE';
    
    public function providerIs()
    {
        return array(
            array('en_US'),
            array('pt_BR'),
            array('af_ZA'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(""),
            array(' '),
            array('en_us'),
            array("Seven 8 nine"),
            array("non:alpha-numeric's"),
            array(array()),
        );
    }
    
    public function providerFix()
    {
        return array(
            // value, result, expect
            array('notacode', false, 'notacode'),
        );
    }
}
