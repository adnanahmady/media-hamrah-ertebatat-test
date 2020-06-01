<?php

namespace App\Http\Controllers;

use App\Custom\Requests\RequestCurrencyList;
use App\Traits\CurrencyDataTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    use CurrencyDataTrait;

    protected $endPoint = 'https://pro-api.coinmarketcap.com/v1';

    public function index()
    {
        $CurrencyList = new RequestCurrencyList();

        $coins = $this->getData(
            $CurrencyList->getCoins()
        );

        return view('convert', compact('coins'));
    }
}
