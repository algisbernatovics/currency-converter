<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ClientRequest

{
    protected object $currencyRates;

    /**
     * @throws GuzzleException
     */
    public function __construct()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.latvijasbanka.lv/vk/ecb.xml');
        $this->currencyRates = simplexml_load_string($res->getBody()->getContents());
        
    }

    public function getCurrencyRates(): object
    {
        return $this->currencyRates;
    }
}

