<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class StrlenMaxTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_STRLEN_MAX';
    
    protected $max = 3;
    
    public function ruleIs($rule)
    {
        return $rule->is($this->max);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot($this->max);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr($this->max);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix($this->max);
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr($this->max);
    }
    
    public function providerIs()
    {
        return array(
            array('a'),
            array('ab'),
            array('abc'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array('abcd'),
            array('abcdefg'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array('a',       true, 'a'),
            array('abc',     true, 'abc'),
            array('abcd',    true, 'abc'),
            array('abcdefg', true, 'abc'),
        );
    }
}
