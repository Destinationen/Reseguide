<?php

namespace Chas\APIBundle\Tests\Utility;

use Chas\APIBundle\Utility\RequestHash;

class RequestHashTest extends \PHPUnit_Framework_TestCase
{
    public function testGetHash()
    {
        $rh = RequestHash::getHash();
        
        $this->assertTrue(is_string($rh));
    }
}
