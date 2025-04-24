<?php

namespace Inserve\ALSOCloudMarketplaceAPI\Client;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Inserve\ALSOCloudMarketplaceAPI\Exception\MarketplaceAPIException;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use SensitiveParameter;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 *
 */
class APIClient
{
    use LoggerAwareTrait;

    /**
     * @var string|null
     */
    protected $sessionToken = null;
    /**
     * @var Serializer
     */
    protected $serializer;
    /**
     * @var ObjectNormalizer
     */
    protected $normalizer;
    protected $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;

        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $nameConverter =  new MetadataAwareNameConverter(
            $classMetadataFactory,
            new CamelCaseToSnakeCaseNameConverter()
        );

        $extractor = new PropertyInfoExtractor(
            [new PhpDocExtractor()]
        );
        $this->normalizer = new ObjectNormalizer(
            $classMetadataFactory,
            $nameConverter,
            null,
            $extractor,
            null,
            [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]
        );

        $this->serializer = new Serializer(
            [$this->normalizer, new ArrayDenormalizer()],
            [new JsonEncoder(), new XmlEncoder()]
        );
    }

    /**
     * @param string $sessionToken
     *
     * @return void
     */
    public function setSessionToken(string $sessionToken): void
    {
        $this->sessionToken = $sessionToken;
    }

    /**
     * @return string|null
     */
    public function getSessionToken(): ?string
    {
        return $this->sessionToken;
    }

    /**
     * @param mixed  $response
     * @param string $class
     *
     * @return mixed
     *
     * @throws ExceptionInterface
     */
    public function denormalize($response, string $class)
    {
        try {
            return $this->normalizer->denormalize($response, $class);
        } catch (Exception $exception) {
            $this->logError(sprintf('(%s): %s', __FUNCTION__, $exception->getMessage()));

            return null;
        }
    }

    /**
     * @param string      $url
     * @param string|null $body
     *
     * @return mixed
     *
     * @throws MarketplaceAPIException
     */
    public function call(string $url, ?string $body = null)
    {
        try {
            $request = new Request(
                'POST',
                $this->getAPIUrl($url),
                $this->getDefaultHeaders(),
                $body
            );
            $response = $this->client->send($request);

            return json_decode((string) $response->getBody(), true);
        } catch (GuzzleException|BadResponseException $exception) {
            $errorMessage = $exception->getMessage();

            if ($exception instanceof RequestException) {
                $response = $exception->getResponse();
                $errorResponse = $this->serializer->decode(
                    $response ? (string) $response->getBody() : '',
                    'xml'
                );
                $errorMessage = $errorResponse['Reason']['Text']['#'] ?? 'Invalid API call';
            }

            $this->logError($errorMessage);

            throw new MarketplaceAPIException(
                sprintf('%s: %s', $url, $errorMessage),
                $exception->getCode()
            );
        }
    }

    /**
     * @return string[]
     */
    protected function getDefaultHeaders(): array
    {
        $headers = [
            'Content-Type' => 'application/json',
        ];

        if ($this->sessionToken !== null) {
            $headers['Authenticate'] = $this->sessionToken;
        }

        return $headers;
    }

    /**
     * @param string $url
     *
     * @return string
     */
    protected function getAPIUrl(string $url): string
    {
        return sprintf('/SimpleAPI/SimpleAPIService.svc/rest/%s', $url);
    }

    /**
     * @param string $message
     *
     * @return void
     */
    private function logError(string $message): void
    {
        if (! $this->logger) {
            return;
        }

        $this->logger->error($message);
    }
}
