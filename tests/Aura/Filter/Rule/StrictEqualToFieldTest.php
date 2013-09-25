<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class StrictEqualToFieldTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_STRICT_EQUAL_TO_FIELD';
    
    protected $other_field = 'other';
    
    protected $other_value = '1';
    
    public function ruleIs($rule)
    {
        return $rule->is($this->other_field);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot($this->other_field);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr($this->other_field);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix($this->other_field);
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr($this->other_field);
    }
    
    public function getPrep($value)
    {
        $data = array(
            'field' => $value,
            $this->other_field => $this->other_value
        );
        
        $field = 'field';
        
        return array($data, $field);
    }
    
    public function providerIs()
    {
        return array(
            array('1'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(1),
            array(true),
            array(1.00),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(0,     true, '1'),
            array(1,     true, '1'),
            array('1',   true, '1'),
            array(true,  true, '1'),
            array(false, true, '1'),
        );
    }
    
    public function testRuleIs_fieldNotSet()
    {
        list($data, $field) = $this->getPrep('foo');
        $rule = $this->newRule($data, $field);
        $this->assertFalse($rule->is('no_such_field'));
    }
    
    public function testRuleIsNot_fieldNotSet()
    {
        list($data, $field) = $this->getPrep('foo');
        $rule = $this->newRule($data, $field);
        $this->assertTrue($rule->isNot('no_such_field'));
    }
    
    public function testRuleFix_fieldNotSet()
    {
        list($data, $field) = $this->getPrep('foo');
        $rule = $this->newRule($data, $field);
        $this->assertFalse($rule->fix('no_such_field'));
    }
}
