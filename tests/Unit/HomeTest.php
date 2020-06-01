<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

class HomeTest extends TestCase
{
	protected $endPoint =
		'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';

	/** @test */
	public function request_data_must_response_correctly()
	{

        $parameters = [
            'start' => '1',
            'limit' => '15',
            'convert' => 'USD'
        ];

        try {
            $data = (new Client([
            ]))->request(
                'get',
                $this->endPoint,
                [
                    'query' => $parameters,
                    'headers' => [
                        'Accepts' => 'application/json',
                        'X-CMC_PRO_API_KEY' => env('CMC_PRO_API_KEY', 'test')
                    ]
                ]
            );
        } catch (BadResponseException $ex) {
            echo env('CMC_PRO_API_KEY', 'test');
            echo $ex->getResponse()->getBody()->getContents();
        }

	$this->assertEquals(200, $data->getStatusCode());
	}
}
