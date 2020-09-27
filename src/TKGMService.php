<?php

namespace Burakaktna\TKGMService;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class TKGMService
 * @package Burakaktna\TKGMService
 */
class TKGMService
{
    /**
     * @var string
     */
    private string $baseUrl;
    /**
     * @var string
     */
    private string $url;
    /**
     * @var Client
     */
    private Client $client;

    /**
     * TKGMService constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->baseUrl = 'https://cbsservis.tkgm.gov.tr/megsiswebapi.v3/api/';
    }


    /**
     * @param string $baseUrl
     * @return $this
     */
    public function setBaseUrl(string $baseUrl): TKGMService
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): TKGMService
    {
        $this->url = $this->baseUrl . $url;
        return $this;
    }

    /**
     * @return $this
     */
    public function getProvinces(): TKGMService
    {
        $this->setUrl('idariYapi/ilListe');
        return $this;
    }

    /**
     * @param int $provinceId
     * @return $this
     */
    public function getDistricts(int $provinceId): TKGMService
    {
        $this->setUrl('idariYapi/ilceListe/' . $provinceId);
        return $this;
    }

    /**
     * @param int $districtId
     * @return $this
     */
    public function getNeighborhoods(int $districtId): TKGMService
    {
        $this->setUrl('idariYapi/mahalleListe/' . $districtId);
        return $this;
    }


    /**
     * @param int $neighborhoodId
     * @param int $bobId
     * @param int $parcelId
     * @return $this
     */
    public function parcelInquiry(int $neighborhoodId, int $bobId, int $parcelId): TKGMService
    {
        $this->setUrl('parsel/' . $neighborhoodId . '/' . $bobId . '/' . $parcelId);
        return $this;
    }

    /**
     * @return object
     * @throws GuzzleException
     */
    public function submit(): object
    {
        $response = $this->client->get($this->url);

        return $response->getBody();
    }
}

