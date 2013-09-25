<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class BoolTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_BOOL';
    
    public function providerIs()
    {
        return array(
            array(true),
            array('on'),
            array('On'),
            array('ON'),
            array('yes'),
            array('Yes'),
            array('YeS'),
            array('y'),
            array('Y'),
            array('true'),
            array('True'),
            array('TrUe'),
            array('t'),
            array('T'),
            array(1),
            array('1'),
            array(false),
            array('off'),
            array('Off'),
            array('OfF'),
            array('no'),
            array('No'),
            array('NO'),
            array('n'),
            array('N'),
            array('false'),
            array('False'),
            array('FaLsE'),
            array('f'),
            array('F'),
            array(0),
            array('0'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array('nothing'),
            array(123),
        );
    }
    
    public function providerFix()
    {
        return array(
            // sanitize to true
            array(true,          true, true),
            array('on',          true, true),
            array('On',          true, true),
            array('ON',          true, true),
            array('yes',         true, true),
            array('Yes',         true, true),
            array('YeS',         true, true),
            array('y',           true, true),
            array('Y',           true, true),
            array('true',        true, true),
            array('True',        true, true),
            array('TrUe',        true, true),
            array('t',           true, true),
            array('T',           true, true),
            array(1,             true, true),
            array('1',           true, true),
            array('not empty',   true, true),
            // sanitize to false
            array(false,         true, false),
            array('off',         true, false),
            array('Off',         true, false),
            array('OfF',         true, false),
            array('no',          true, false),
            array('No',          true, false),
            array('NO',          true, false),
            array('n',           true, false),
            array('N',           true, false),
            array('false',       true, false),
            array('False',       true, false),
            array('FaLsE',       true, false),
            array('f',           true, false),
            array('F',           true, false),
            array(0,             true, false),
            array('0',           true, false),
        );
    }
}
