<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class InKeysTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_IN_KEYS';
    
    protected $opts = array(
        0      => 'val0',
        1      => 'val1',
        'key0' => 'val3',
        'key1' => 'val4',
        'key2' => 'val5'
    );
    
    public function ruleIs($rule)
    {
        return $rule->is($this->opts);
    }
    
    public function ruleIsNot($rule)
    {
        return $rule->isNot($this->opts);
    }
    
    public function ruleIsBlankOr($rule)
    {
        return $rule->isBlankOr($this->opts);
    }
    
    public function ruleFix($rule)
    {
        return $rule->fix($this->opts);
    }
    
    public function ruleFixBlankOr($rule)
    {
        return $rule->fixBlankOr($this->opts);
    }
    
    public function providerIs()
    {
        return array(
            array(0),
            array(1),
            array('key0'),
            array('key1'),
            array('key2'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(null),
            array(false),
            array(''),
            array(1.2),
            array(3),
            array(4),
            array('a'),
            array('b'),
            array('c'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array('no-good', false, 'no-good'), // cannot fix
        );
    }
}
