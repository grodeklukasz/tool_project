<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    private function makeCrawler($method,$path): void 
    {
        $client = static::createClient();

        $crawler = $client->request($method, $path);
    }
    public function testIfResponse(): void 
    {
        $this->makeCrawler('GET','/home');

        $this->assertResponseIsSuccessful();

    }

    public function testIfRightShowTitle(): void 
    {
        $this->makeCrawler('GET','/home');

        $this->assertSelectorTextContains('h1', 'HomeController');
    }
}