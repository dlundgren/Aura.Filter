<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class RegexTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_REGEX';
    
    protected $expr_validate = '/^[\+\-]?[0-9]+$/';
    
    protected $expr_sanitize = '/[^a-z]/';
    
    public function ruleIs($rule)
    {
        return $rule->is($this->expr_validate);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot($this->expr_validate);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr($this->expr_validate);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix($this->expr_sanitize, '@');
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr($this->expr_sanitize, '@');
    }
    
    public function providerIs()
    {
        return array(
            array('+1234567890'),
            array(1234567890),
            array(-123456789.0),
            array(-1234567890),
            array('-123'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array(' '),
            array(''),
            array('-abc.123'),
            array('123.abc'),
            array('123),456'),
            array('0000123.456000'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array('abc 123 ,./', true, 'abc@@@@@@@@'),
        );
    }
}
