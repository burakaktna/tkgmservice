<?php

namespace Burakaktna\TKGMService;

use Burakaktna\TKGMService\Contracts\ITKGMService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TKGMService extends TKGMServiceAbstract implements ITKGMService
{
    public function __construct(Client $client = null)
    {
        $this->client = $client ?? new Client();
    }

    /**
     * @throws GuzzleException
     */
    public function getProvinces(): object
    {
        return $this->submitRequest('idariYapi/ilListe');
    }

    /**
     * @throws GuzzleException
     */
    public function getDistricts(int $provinceId): object
    {
        return $this->submitRequest('idariYapi/ilceListe/' . $provinceId);
    }

    /**
     * @throws GuzzleException
     */
    public function getNeighborhoods(int $districtId): object
    {
        return $this->submitRequest('idariYapi/mahalleListe/' . $districtId);
    }

    /**
     * @throws GuzzleException
     */
    public function parcelInquiry(int $neighborhoodId, int $bobId, int $parcelId): object
    {
        return $this->submitRequest('parsel/' . $neighborhoodId . '/' . $bobId . '/' . $parcelId);
    }
}
