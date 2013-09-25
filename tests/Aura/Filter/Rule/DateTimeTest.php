<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

use DateTime as PhpDateTime;

class DateTimeTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_DATE_TIME';
    
    public function providerIs()
    {
        return array(
            array('Nov 7, 1979, 12:34pm'),
            array('0001-01-01 00:00:00'),
            array('1970-08-08 12:34:56'),
            array('2004-02-29 12:00:00'),
            array('0000-01-01T12:34:56'),
            array('1979-11-07T12:34'),
            array('1970-08-08t12:34:56'),
            array('12:00:00'),
            array('9999-12-31'),
            array(new PhpDateTime()),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(' '),
            array(''),
            array(array()),
            array('0000-00-00T00:00:00'),
            array('0010-20-40T12:34:56'),
            array('9999.12:31 ab:cd:ef'),
            array('1979-02-29'),
        );
    }
    
    public function providerFix()
    {
        $dt = new PhpDateTime('Nov 7, 1979, 12:34pm');
        return array(
            array(array(), false, array()),
            array('abcdefghi', false, 'abcdefghi'),
            array('2012-08-02 17:37:29', true, '2012-08-02 17:37:29'),
            array($dt, true, '1979-11-07 12:34:00'),
        );
    }
}
