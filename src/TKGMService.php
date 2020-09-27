<?php

namespace Burakaktna\TKGMService;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TKGMService
{
    private string $baseUrl;
    private string $url;
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->baseUrl = 'https://cbsservis.tkgm.gov.tr/megsiswebapi.v3/api/';
    }


    public function setBaseUrl(string $baseUrl): TKGMService
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function setUrl(string $url): TKGMService
    {
        $this->url = $this->baseUrl . $url;
        return $this;
    }

    public function getProvinces(): TKGMService
    {
        $this->setUrl('idariYapi/ilListe');
        return $this;
    }

    public function getDistricts(int $provinceId): TKGMService
    {
        $this->setUrl('idariYapi/ilceListe/' . $provinceId);
        return $this;
    }

    public function getNeighborhoods(int $districtId): TKGMService
    {
        $this->setUrl('idariYapi/mahalleListe/' . $districtId);
        return $this;
    }


    public function parcelInquiry(int $neighborhoodId, int $bobId, int $parcelId): TKGMService
    {
        $this->setUrl('parsel/' . $neighborhoodId . '/' . $bobId . '/' . $parcelId);
        return $this;
    }

    /**
     * @return mixed
     * @throws GuzzleException
     */
    public function submit()
    {
        $response = $this->client->get($this->url);

        return $response->getBody();
    }
}

