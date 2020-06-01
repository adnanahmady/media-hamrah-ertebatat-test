<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use PHPUnit\Framework\TestCase;

class ConvertTest extends TestCase
{
    protected $endPoint = 'https://pro-api.coinmarketcap.com/v1';

    /**
     * @var Client
     */
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new Client;
    }

    /** @test */
    public function convert_coins_must_returns_correct()
    {
        $parameters = [
            'amount' => 1,
            'symbol' => 'BTC',
            'convert' => 'LTC'
        ];

        try {
            $data = $this->client->request(
                'GET',
                $this->endPoint.'/tools/price-conversion',
                [
                    'query' => $parameters,
                    'headers' => [
                        'Accepts' => 'application/json',
                        'X-CMC_PRO_API_KEY' => env('CMC_PRO_API_KEY', 'test')
                    ]
                ]
            );
        } catch (BadResponseException $ex) {
            echo $ex->getResponse()->getBody()->getContents();
        }

        $this->assertEquals(200, $data->getStatusCode());
    }

    /** @test */
    public function fiat_list_must_returns_correct()
    {
        $parameters = [
            'start' => 1,
            'limit' => 5000,
            'sort' => 'id'
        ];

        try {
            $data = $this->client->request(
                'GET',
                $this->endPoint.'/fiat/map',
                [
                    'query' => $parameters,
                    'headers' => [
                        'Accepts' => 'application/json',
                        'X-CMC_PRO_API_KEY' => env('CMC_PRO_API_KEY', 'test')
                    ]
                ]
            );
        } catch (BadResponseException $ex) {
            echo $ex->getResponse()->getBody()->getContents();
        }

        $this->assertEquals(200, $data->getStatusCode());
    }

    /** @test */
    public function cryptocurrency_list_must_returns_correct()
    {
        $parameters = [
            'start' => 1,
            'limit' => 5000,
            'sort' => 'id'
        ];

        try {
            $data = $this->client->request(
                'GET',
                $this->endPoint.'/cryptocurrency/map',
                [
                    'query' => $parameters,
                    'headers' => [
                        'Accepts' => 'application/json',
                        'X-CMC_PRO_API_KEY' => env('CMC_PRO_API_KEY', 'test')
                    ]
                ]
            );
        } catch (BadResponseException $ex) {
            echo $ex->getResponse()->getBody()->getContents();
        }
        $this->assertEquals(200, $data->getStatusCode());
    }
}
