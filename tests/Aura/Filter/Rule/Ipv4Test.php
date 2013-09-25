<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class Ipv4Test extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_IPV4';
    
    public function providerIs()
    {
        return array(
            array('141.225.185.101'),
            array('255.0.0.0'),
            array('0.255.0.0'),
            array('0.0.255.0'),
            array('0.0.0.255'),
            array('127.0.0.1'),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(' '),
            array(''),
            array('127.0.0.1234'),
            array('127.0.0.0.1'),
            array('256.0.0.0'),
            array('0.256.0.0'),
            array('0.0.256.0'),
            array('0.0.0.256'),
            array('1.'),
            array('1.2.'),
            array('1.2.3.'),
            array('1.2.3.4.'),
            array('a.b.c.d'),
        );
    }
    
    public function providerFix()
    {
        return array(
            array(12345, false, 12345), // can't fix
        );
    }
}
