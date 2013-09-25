<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;
use Aura\Filter\RuleLocator;

class AnyTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_ANY';
    
    protected $list = array(
        // alphanumeric
        array('alnum'),
        // only @ signs
        array('regex', '/^[@]+$/')
    );
    
    protected function newRule($data, $field)
    {
        $rule = parent::newRule($data, $field);
        $rule->setRuleLocator(new RuleLocator(array(
            'alnum' => function () { return new \Aura\Filter\Rule\Alnum; },
            'regex' => function () { return new \Aura\Filter\Rule\Regex; },
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
            array(0),
            array(1),
            array(2),
            array(5),
            array('0'),
            array('1'),
            array('2'),
            array('5'),
            array('alphaonly'),
            array('AlphaOnLy'),
            array('someThing8else'),
            array("@@@@@"),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(""),
            array(' '),
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
        // can't fix on "any" rule combinations
        return array(
            array('$#% abc () 123 ,./', false, '$#% abc () 123 ,./'),
        );
    }
}
