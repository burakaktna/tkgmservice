<?php

namespace Burakaktna\TKGMService\Examples;

require_once __DIR__ . '/../vendor/autoload.php';
use Burakaktna\TKGMService\TKGMService;
use GuzzleHttp\Exception\GuzzleException;

class Example
{
    private TKGMService $tkgmService;

    public function __construct(TKGMService $tkgmService)
    {
        $this->tkgmService = $tkgmService;
    }

    public function run(): void
    {
        try {
            $provinces = $this->tkgmService->getProvinces();
            var_dump($provinces);
        } catch (GuzzleException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

$example = new Example(new TKGMService());
$example->run();
