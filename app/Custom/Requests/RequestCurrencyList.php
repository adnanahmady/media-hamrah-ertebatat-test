<?php


namespace App\Custom\Requests;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class RequestCurrencyList
{
    /**
     * @var Client
     */
    protected $Client;

    /**
     * @var string request endpoints
     */
    protected $endPoint = 'https://pro-api.coinmarketcap.com/v1';

    /**
     * @var array requests headers
     */
    protected $headers;

    public function __construct()
    {
        $this->Client = new Client([
            'base_url' => $this->endPoint
        ]);

        $this->headers = [
            'Accepts' => 'application/json',
            'X-CMC_PRO_API_KEY' => config('currency.api.key')
        ];
    }

    /**
     * returns coins list
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCoins()
    {
        $parameters = [
            'start' => 1,
            'limit' => 5000,
            'sort' => 'id'
        ];

        try {
            return $this->Client->request(
                'GET',
                $this->endPoint.'/cryptocurrency/map',
                [
                    'query' => $parameters,
                    'headers' => $this->headers
                ]
            );
        } catch (BadResponseException $ex) {
            return null;
        }
    }

    /**
     * returns coins list
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFiats()
    {
        $parameters = [
            'start' => 1,
            'limit' => 5000,
            'sort' => 'id'
        ];

        try {
            return $this->Client->request(
                'GET',
                $this->endPoint.'/fiat/map',
                [
                    'query' => $parameters,
                    'headers' => $this->headers
                ]
            );
        } catch (BadResponseException $ex) {
            return null;
        }
    }

    /**
     * gets data from uri
     *
     * @param int $limit number of returned items
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCurrencies(int $limit)
    {
        $parameters = [
            'start' => '1',
            'convert' => 'USD',
            'limit' => $limit
        ];

        try {
            return $this->Client->request(
                'GET',
                $this->endPoint.'/cryptocurrency/listings/latest',
                [
                    'query' => $parameters,
                    'headers' => $this->headers
                ]
            );
        } catch (BadResponseException $ex) {
            return null;
        }
    }

    /**
     * gets data from uri
     *
     * @param int $limit number of returned items
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function requestConvert(
        int $amount,
        string $symbol,
        string $convert
    ) {

        $parameters = [
            'amount' => $amount,
            'symbol' => $symbol,
            'convert' => $convert
        ];

        try {
            return $this->Client->request(
                'GET',
                $this->endPoint.'/tools/price-conversion',
                [
                    'query' => $parameters,
                    'headers' => $this->headers
                ]
            );
        } catch (BadResponseException $ex) {
            return null;
        }
    }
}
