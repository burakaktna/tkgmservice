<?php


namespace Burakaktna\TKGMService;

class Example
{
    private TKGMService $tkgmService;

    public function __construct(TKGMService $tkgmService)
    {
        $this->tkgmService = $tkgmService;
    }

    public function getProvinces(): array
    {
        return $this->tkgmService->getProvinces()->submit();
    }

    public function getDistricts(int $districtId): array
    {
        return $this->tkgmService->getDistricts($districtId)->submit();
    }

    public function getNeighborhoods(int $districtId): array
    {
        return $this->tkgmService->getNeighborhoods($districtId)->submit();
    }

    public function parcelInquiry(int $neighborhoodId, int $bobId, int $parcelId): array
    {
        return $this->tkgmService->parcelInquiry($neighborhoodId, $bobId, $parcelId)->submit();
    }
}
