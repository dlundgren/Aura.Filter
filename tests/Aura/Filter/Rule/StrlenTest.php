<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class StrlenTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_STRLEN';
    
    protected $len = 4;
    
    public function ruleIs($rule)
    {
        return $rule->is($this->len);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot($this->len);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr($this->len);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix($this->len);
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr($this->len);
    }
    
    public function providerIs()
    {
        return array(
            array('abcd'),
            array('efgh'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array('abc'),
            array('defgh'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array('a',       true, 'a   '),
            array('abcd',    true, 'abcd'),
            array('abcdef',  true, 'abcd'),
        );
    }
}
