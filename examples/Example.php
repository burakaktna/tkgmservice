<?php


namespace Burakaktna\TKGMService;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Example
 * @package Burakaktna\TKGMService
 */
class Example
{
    /**
     * @var TKGMService
     */
    private TKGMService $tkgmService;

    /**
     * Example constructor.
     * @param TKGMService $tkgmService
     */
    public function __construct(TKGMService $tkgmService)
    {
        $this->tkgmService = $tkgmService;
    }

    /**
     * @return object
     * @throws GuzzleException
     */
    public function getProvinces(): object
    {
        return $this->tkgmService->getProvinces()->submit();
    }

    /**
     * @param int $districtId
     * @return object
     * @throws GuzzleException
     */
    public function getDistricts(int $districtId): object
    {
        return $this->tkgmService->getDistricts($districtId)->submit();
    }

    /**
     * @param int $districtId
     * @return object
     * @throws GuzzleException
     */
    public function getNeighborhoods(int $districtId): object
    {
        return $this->tkgmService->getNeighborhoods($districtId)->submit();
    }

    /**
     * @param int $neighborhoodId
     * @param int $bobId
     * @param int $parcelId
     * @return object
     * @throws GuzzleException
     */
    public function parcelInquiry(int $neighborhoodId, int $bobId, int $parcelId): object
    {
        return $this->tkgmService->parcelInquiry($neighborhoodId, $bobId, $parcelId)->submit();
    }
}
