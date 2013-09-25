<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class MinTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_MIN';
    
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
            array(4),
            array(5),
            array(6),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array(1),
            array(2),
            array(3),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array(1, true, 4),
            array(2, true, 4),
            array(3, true, 4),
            array(4, true, 4),
            array(5, true, 5),
            array(6, true, 6),
        );
    }
}
