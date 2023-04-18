<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class test
{
public function __construct()
{

$client = new Client(['base_uri' => 'https://www.latvijasbanka.lv/vk/ecb.xml']);
$request = new Request('GET', "https://www.latvijasbanka.lv/vk/ecb.xml");
$promise = $client->sendAsync($request)->then(function ($response) {

$data = simplexml_load_string($response->getBody());
var_dump($data);


});
}
}

