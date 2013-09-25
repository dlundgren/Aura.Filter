<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;
use Aura\Filter\RuleLocator;

class AllTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_ALL';
    
    protected $list = array(
        array('alnum'),
        array('strlen', 4)
    );
    
    protected function newRule($data, $field)
    {
        $rule = parent::newRule($data, $field);
        $rule->setRuleLocator(new RuleLocator(array(
            'alnum' => function () { return new \Aura\Filter\Rule\Alnum; },
            'strlen' => function () { return new \Aura\Filter\Rule\Strlen; },
        )));
        return $rule;
    }
    
    public function ruleIs($rule)
    {
        return $rule->is($this->list);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot($this->list);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr($this->list);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix($this->list);
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr($this->list);
    }
    
    public function providerIs()
    {
        return array(
            array('0123'),
            array('abcd'),
            array('01ab'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array('1234abcd'),
            array("Seven 8 nine"),
            array("non:alpha-numeric's"),
            array(array()),
            array("something @ somewhere.edu"),
            array("the-name.for!you"),
            array("non:alpha@example.com"),
            array(""),
            array("\t\n"),
            array(" "),
        );
    }
    
    public function providerFix()
    {
        // can't fix on "all" rule combinations
        return array(
            array('$#% abc () 123 ,./', false, '$#% abc () 123 ,./'),
        );
    }
}
