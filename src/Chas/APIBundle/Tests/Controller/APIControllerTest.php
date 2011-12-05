<?php

namespace Chas\APIBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class APIControllerTest extends WebTestCase
{
    public function testWelcome()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/');
        
        $this->assertTrue($crawler->filter('h1')->count() > 0);
    }
}
