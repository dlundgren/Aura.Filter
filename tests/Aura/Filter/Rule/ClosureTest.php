<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class ClosureTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_CLOSURE';
    
    protected function setUp()
    {
        // Testing if we are dealing with version 5.3.0 or higher
        if (!version_compare(PHP_VERSION, '5.4.0', '>=')) {
            $this->markTestSkipped('Invalid PHP version, unable to run tests.');
        }

        parent::setUp();
        
        // validates a value as an actual boolean
        $this->validate_closure = function () {
            return is_bool($this->getValue());
        };
        
        // sanitizes a value to an actual boolean
        $this->sanitize_closure = function () {
            $value = (bool) $this->getValue();
            $this->setValue($value);
            return true;
        };
    }
    
    public function ruleIs($rule)
    {
        return $rule->is($this->validate_closure);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot($this->validate_closure);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr($this->validate_closure);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix($this->sanitize_closure);
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr($this->sanitize_closure);
    }
    
    public function providerIs()
    {
        return array(
            array(true),
            array(false),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(0),
            array(1),
            array(null),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(0, true, false),
            array(1, true, true),
        );
    }
}
