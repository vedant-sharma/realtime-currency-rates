<?php

namespace App\Http\Controllers;

use App\Services\CurrencyConverterService;

class CurrencyConverterController extends Controller
{
    /**
     * @var CurrencyConverterService
     */
    protected $currencyConverterService;

    /**
     * @param CurrencyConverterService
     */
    public function __construct(
        CurrencyConverterService $currencyConverterService
    ){
        $this->currencyConverterService = $currencyConverterService;
    }

    public function getCurrencyRates()
    {
        $inputs = request()->all();

        $response = $this->currencyConverterService->getCurrencyRates($inputs);

        return response()->view('currency_converter', compact('response'));
    }
}

