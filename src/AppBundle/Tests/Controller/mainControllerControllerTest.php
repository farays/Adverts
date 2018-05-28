<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class mainControllerControllerTest extends WebTestCase
{
    public function testEmploi()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/emploi');
    }

}
