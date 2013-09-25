<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class StrlenBetweenTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_STRLEN_BETWEEN';
    
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
            array('abcd'),
            array('efghi'),
            array('jklmno'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array('abc'),
            array('defghij'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array('abc',         true, 'abc '),
            array('abcd',        true, 'abcd'),
            array('abcde',       true, 'abcde'),
            array('abcdef',      true, 'abcdef'),
            array('abcdefg',     true, 'abcdef'),
            array('abcdefgh',    true, 'abcdef'),
        );
    }
}
