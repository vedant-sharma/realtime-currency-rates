<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client as GuzzleClient;

class CurrencyConverterService 
{
    /**
     * void
     */
    public function __construct()
    {
        $this->guzzle = new GuzzleClient(
			["base_uri" => "https://freecurrencyapi.net/api/v2/latest/"]
		);
    }

    public function getCurrencyRates()
    {
        try {
            $response = $this->guzzle->get(
                '', 
                [
                    'query' => [
                        'apikey'        => '987d2c10-6d79-11ec-b804-5b37eaf85739',
                        'base_currency' => 'INR'
                    ]
                ]
            );

            $res = json_decode($response->getBody(), true);
            return $res['data'];

        } catch (Exception $e) {
            logger($e->getMessage());
        }
    }
}

