<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class MaxTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_MAX';
    
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
            array(1),
            array(2),
            array(3),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array(4),
            array(5),
            array(6),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array(1, true, 1),
            array(2, true, 2),
            array(3, true, 3),
            array(4, true, 3),
            array(5, true, 3),
            array(6, true, 3),
        );
    }
}
