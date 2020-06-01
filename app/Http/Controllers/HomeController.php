<?php

namespace App\Http\Controllers;

use App\Custom\Requests\RequestCurrencyList;
use App\Custom\ResponseHandlers\CurrencyCollection;
use App\Traits\CurrencyDataTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    use CurrencyDataTrait;

    /**
     * shows currencies information
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return View
     */
    public function index(): View
    {
        $data = $this->getData(
            (new RequestCurrencyList)
                ->getCurrencies(15)
        );
        $data = (
            new CurrencyCollection($data)
        )->handle();

        return view('welcome', compact('data'));
    }
}
