<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InscriptionControllerTest extends WebTestCase
{
    public function testSinscrir()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pages/inscription.html.twig');
    }

}
