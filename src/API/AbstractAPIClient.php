<?php

namespace Inserve\ALSOCloudMarketplaceAPI\API;

use Inserve\ALSOCloudMarketplaceAPI\Client\APIClient;

/**
 *
 */
abstract class AbstractAPIClient
{
    protected $apiClient;
    /**
     * @param APIClient $apiClient
     */
    public function __construct(APIClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
