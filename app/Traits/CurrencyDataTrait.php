<?php

namespace App\Traits;

use Psr\Http\Message\ResponseInterface;

trait CurrencyDataTrait
{
    /**
     * returns data field
     *
     * @param null|ResponseInterface $response
     *
     * @return array
     */
    public function getData($response): array
    {
        if ($response === null) {
            return [];
        }

        return json_decode($response->getBody(), true)['data'];
    }
}
