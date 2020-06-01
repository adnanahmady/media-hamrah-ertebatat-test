<?php

namespace App\Http\Controllers;

use App\Custom\Requests\RequestCurrencyList;
use App\Http\Requests\ConvertRequest;
use App\Http\Resources\ConvertResource;
use App\Traits\CurrencyDataTrait;
use Illuminate\Http\Request;

class RequestConvertController extends Controller
{
    use CurrencyDataTrait;

    public function convert(ConvertRequest $request)
    {
        $Convert = new RequestCurrencyList;

        $data = $this->getData($Convert->requestConvert(
            $request->get('amount'),
            $request->get('symbol'),
            $request->get('convert')
        ));

        return new ConvertResource($data);
    }
}
