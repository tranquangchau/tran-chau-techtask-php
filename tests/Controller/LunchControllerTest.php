<?php

namespace App\Tests\Util;

use App\Controller\LunchController;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class LunchControllerTest extends WebTestCase
{
    const URL = 'lunch';
    const RESPONSE_CODE_SUCESS = 200;
    const RESPONSE_CODE_ERROR = 404;

    public function test_url()
    {

        $client = static::createClient();
        $client->request('GET', self::URL);
        $response = $client->getResponse();
        $this->assertEquals(self::RESPONSE_CODE_SUCESS, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }
    public function testUrlNotAllow01()
    {        
        $client = static::createClient();        
        $client->request('GET', self::URL.'/sdfsdf');
        $response = $client->getResponse();

        $this->assertEquals(self::RESPONSE_CODE_ERROR, $response->getStatusCode());
        // $this->assertJson($response->getContent());

    }
    public function testUrlNotAllow02()
    {
        
        $client = static::createClient();
        
        $client->request('GET', self::URL.'/1231');
        $response = $client->getResponse();

        $this->assertEquals(self::RESPONSE_CODE_ERROR, $response->getStatusCode());
        // $this->assertJson($response->getContent());

    }
    
}
