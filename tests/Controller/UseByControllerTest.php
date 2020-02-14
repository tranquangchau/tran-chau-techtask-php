<?php

namespace App\Tests\Util;

use App\Controller\LunchController;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class UseByControllerTest extends WebTestCase
{
    const URL = 'use-by';
    const RESPONSE_CODE_SUCESS = 200;
    const RESPONSE_CODE_ERROR = 404;

    public function test_url()
    {

        $client = static::createClient();
        $client->request('GET', self::URL. '/2019-12-12');
        $response = $client->getResponse();
        $this->assertEquals(self::RESPONSE_CODE_SUCESS, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }
    public function testUrlNotAllow01()
    {
        $client = static::createClient();        
        $client->request('GET', self::URL);
        $response = $client->getResponse();

        $this->assertEquals(self::RESPONSE_CODE_ERROR, $response->getStatusCode());
        // $this->assertJson($response->getContent());

    }
    public function testUrlNotCorrectFormart01()
    {
        
        $client = static::createClient();
        
        $client->request('GET', self::URL.'/1231');
        $response = $client->getResponse();

        $this->assertEquals('{"msg":"format wrong Y-m-d","is_check":false}', $response->getContent());
        $this->assertJson($response->getContent());
    }
    public function testUrlNotCorrectFormart02()
    {
        
        $client = static::createClient();
        
        $client->request('GET', self::URL.'/2020-02-44');
        $response = $client->getResponse();

        $this->assertEquals('{"msg":"format wrong Y-m-d","is_check":false}', $response->getContent());
        $this->assertJson($response->getContent());
    }
    public function testUrlNotCorrectFormart03()
    {
        
        $client = static::createClient();
        
        $client->request('GET', self::URL.'/2020-03');
        $response = $client->getResponse();

        $this->assertEquals('{"msg":"format wrong Y-m-d","is_check":false}', $response->getContent());
        $this->assertJson($response->getContent());
    }
    
}
