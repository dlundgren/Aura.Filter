<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class StrlenMinTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_STRLEN_MIN';
    
    protected $min = 4;
    
    public function ruleIs($rule)
    {
        return $rule->is($this->min);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot($this->min);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr($this->min);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix($this->min);
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr($this->min);
    }
    
    public function providerIs()
    {
        return array(
            array('abcd'),
            array('efghijkl'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array('a'),
            array('ab'),
            array('abc'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array('a',       true, 'a   '),
            array('abcd',    true, 'abcd'),
            array('abcdefg', true, 'abcdefg'),
        );
    }
}
