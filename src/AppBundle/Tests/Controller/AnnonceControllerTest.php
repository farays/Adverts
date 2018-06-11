<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AnnonceControllerTest extends WebTestCase
{
    public function testNewannonce()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pages/addannonce');
    }

}
