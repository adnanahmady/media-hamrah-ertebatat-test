<?php

namespace App\Http\Controllers;

use App\Custom\Requests\RequestCurrencyList;
use App\Traits\CurrencyDataTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConvertController extends Controller
{
    use CurrencyDataTrait;

    public function index()
    {
        $CurrencyList = new RequestCurrencyList();

        $coins = $this->getData(
            $CurrencyList->getCoins()
        );

        return new Response($coins);
    }
}
