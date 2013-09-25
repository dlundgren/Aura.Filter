<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class TrimTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_TRIM';
    
    public function providerIs()
    {
        return array(
            array('abc'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array(' abc '),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array(' abc ', true, 'abc'),
        );
    }
}
