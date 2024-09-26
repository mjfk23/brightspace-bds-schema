<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator;

use Brightspace\Bds\Schema\Entity\DatasetModule;
use Gadget\Http\ApiClient;

final class ModuleLoader
{
    /**
     * @param ApiClient $apiClient
     */
    public function __construct(private ApiClient $apiClient)
    {
    }


    /**
     * @param DatasetModule $module
     * @return non-empty-string
     */
    public function loadModule(DatasetModule $module): string
    {
        $request = $this->apiClient->createServerRequest('GET', $module->url);
        $response = $this->apiClient->sendRequest($request);
        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException("Error fetching module: '{$module->name}'");
        }

        $contents = $response->getBody()->getContents();
        if (strlen($contents) < 1) {
            throw new \RuntimeException();
        }

        /** @var non-empty-string $contents */
        return $contents;
    }
}
