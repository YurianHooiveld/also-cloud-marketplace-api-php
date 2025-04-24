<?php

namespace Inserve\ALSOCloudMarketplaceAPI;

use GuzzleHttp\Client;
use Inserve\ALSOCloudMarketplaceAPI\API\CompanyAPI;
use Inserve\ALSOCloudMarketplaceAPI\API\MarketplaceAPI;
use Inserve\ALSOCloudMarketplaceAPI\API\SubscriptionAPI;
use Inserve\ALSOCloudMarketplaceAPI\API\UserAPI;
use Inserve\ALSOCloudMarketplaceAPI\Client\APIClient;
use Inserve\ALSOCloudMarketplaceAPI\Exception\MarketplaceAPIException;
use Psr\Log\LoggerInterface;
use SensitiveParameter;

/**
 * @property CompanyAPI      $company
 * @property MarketplaceAPI  $marketplace
 * @property SubscriptionAPI $subscription
 * @property UserAPI         $user
 */
class MarketplaceAPIClient
{
    /**
     * @var APIClient|null
     */
    protected $apiClient;

    /**
     * @param APIClient|null       $apiClient
     * @param LoggerInterface|null $logger
     * @param string|null          $baseUri
     */
    public function __construct(?APIClient $apiClient = null, ?LoggerInterface $logger = null, ?string $baseUri = null)
    {
        if (! $apiClient) {
            $apiClient = new APIClient(
                new Client(['base_uri' => $baseUri ?? 'https://marketplace.also.nl'])
            );
        }

        if ($logger) {
            $apiClient->setLogger($logger);
        }

        $this->apiClient = $apiClient;
    }

    /**
     * @param string        $name
     * @param array<string> $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        return $this->__get($name);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        $fqdnClass = sprintf('%s\\API\\%sAPI', __NAMESPACE__, ucfirst($name));

        if (class_exists($fqdnClass)) {
            return new $fqdnClass($this->apiClient);
        }

        return null;
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return string
     *
     * @throws MarketplaceAPIException
     */
    public function authenticate(string $username, string $password): string
    {
        $loginData = json_encode(compact('username', 'password'));
        $sessionToken = (string) $this->apiClient->call('GetSessionToken', (string) $loginData);
        $this->setSessionToken($sessionToken);

        return $sessionToken;
    }

    /**
     * @param string $sessionToken
     *
     * @return void
     */
    public function setSessionToken(string $sessionToken): void
    {
        $this->apiClient->setSessionToken($sessionToken);
    }
}
