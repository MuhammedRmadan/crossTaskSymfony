<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

class CarControllerTest extends TestCase
{
    /** test */
    public function testGetCars()
    {

        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost:8000/cars/index', ['body' => array(
            'limit' => 5,
            'page' => 1,
            'sort' => 'c.id',
            'direction' => 'asc',
            'search' => 'black',
        )]);

        $this->assertEquals(200, $response->getStatusCode());

    }
}
