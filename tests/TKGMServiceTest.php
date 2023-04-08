<?php

namespace Burakaktna\TKGMService\Tests;

use Burakaktna\TKGMService\Contracts\ITKGMService;
use Burakaktna\TKGMService\TKGMService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class TKGMServiceTest extends TestCase
{
    protected ITKGMService $tkgmService;

    protected function setUp(): void
    {
        $mock = new MockHandler([
            new Response(200, [], '{"success":true, "data":[]}'),
            new Response(200, [], '{"success":true, "data":[]}'),
            new Response(200, [], '{"success":true, "data":[]}'),
            new Response(200, [], '{"success":true, "data":[]}')
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $this->tkgmService = new TKGMService($client);
    }

    /**
     * @throws GuzzleException
     */
    public function testGetProvinces(): void
    {
        $response = $this->tkgmService->getProvinces();
        $this->assertTrue($response->success);
        $this->assertIsArray($response->data);
    }

    /**
     * @throws GuzzleException
     */
    public function testGetDistricts(): void
    {
        $response = $this->tkgmService->getDistricts(1);
        $this->assertTrue($response->success);
        $this->assertIsArray($response->data);
    }

    /**
     * @throws GuzzleException
     */
    public function testGetNeighborhoods(): void
    {
        $response = $this->tkgmService->getNeighborhoods(1);
        $this->assertTrue($response->success);
        $this->assertIsArray($response->data);
    }

    /**
     * @throws GuzzleException
     */
    public function testParcelInquiry(): void
    {
        $response = $this->tkgmService->parcelInquiry(1, 1, 1);
        $this->assertTrue($response->success);
        $this->assertIsArray($response->data);
    }
}
