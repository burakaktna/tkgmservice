<?php

namespace Burakaktna\TKGMService;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class TKGMServiceAbstract
{
    protected Client $client;
    protected string $baseUrl = 'https://cbsservis.tkgm.gov.tr/megsiswebapi.v3/api/';

    /**
     * @throws GuzzleException
     */
    protected function submitRequest(string $url): object
    {
        $response = $this->client->get($this->baseUrl . $url);
        return json_decode($response->getBody());
    }
}
