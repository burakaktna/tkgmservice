<?php

namespace Burakaktna\TKGMService\Contracts;

interface ITKGMService
{
    public function getProvinces(): object;

    public function getDistricts(int $provinceId): object;

    public function getNeighborhoods(int $districtId): object;

    public function parcelInquiry(int $neighborhoodId, int $bobId, int $parcelId): object;
}
