<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class BetweenTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_BETWEEN';
    
    protected $min = 4;
    
    protected $max = 6;
    
    public function ruleIs($rule)
    {
        return $rule->is($this->min, $this->max);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot($this->min, $this->max);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr($this->min, $this->max);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix($this->min, $this->max);
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr($this->min, $this->max);
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
            array(2),
            array(3),
            array(7),
            array(8),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array(2, true, 4),
            array(3, true, 4),
            array(4, true, 4),
            array(5, true, 5),
            array(6, true, 6),
            array(7, true, 6),
            array(8, true, 6),
        );
    }
}
