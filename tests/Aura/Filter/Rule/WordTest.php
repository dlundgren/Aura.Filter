<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

/**
 * 
 * Sanitizes a value to a string with only word characters.
 * 
 * @package Aura.Filter
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
class WordTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_WORD';
    
    public function providerIs()
    {
        return array(
            array('abc'),
            array('def'),
            array('ghi'),
            array('abc_def'),
            array('A1s_2Sd'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(array()),
            array(''),
            array('a!'),
            array('^b'),
            array('%'),
            array('ab-db cd-ef'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(array(), false, array()),
            array('abc _ 123 - ,./', true, 'abc_123'),
        );
    }
}
