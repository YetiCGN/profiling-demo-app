<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CaseStudyControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/case-study');
    }

    public function testSingleton()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/case-study/singleton');
    }

}
