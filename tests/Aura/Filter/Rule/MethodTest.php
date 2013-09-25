<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class MethodTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_METHOD';
    
    public function ruleIs($rule)
    {
        return $rule->is('validate', true);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot('validate', false);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr('validate', true);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix('sanitize', true);
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr('sanitize', true);
    }
    
    public function providerIs()
    {
        return array(
            array(new MockValue),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(new MockValue),
            array('not an object'),
            array(''),
        );
    }
    
    public function providerFix()
    {
        $object = new MockValue;
        return array(
            array($object, true, $object),
            array('not an object', false, 'not an object'),
        );
    }
}
