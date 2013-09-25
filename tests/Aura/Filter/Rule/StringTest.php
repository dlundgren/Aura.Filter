<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class StringTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_STRING';
    
    public function ruleFix($rule)
    {
        return $rule->fix(' ', '@');
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr(' ', '@');
    }
    
    public function providerIs()
    {
        return array(
            array(12345),
            array(123.45),
            array(true),
            array(false),
            array('string'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array(new \StdClass),
        );
    }
    
    public function providerFix()
    {
        return array(
            array('abc 123 ,./', true, 'abc@123@,./'),
            array(12345, true, '12345'),
        );
    }
}
