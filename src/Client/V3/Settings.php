<?php

declare(strict_types=1);

namespace Lalamove\Client\V3;

use Psr\Log\LoggerInterface;

class Settings
{
    public $host;
    public $apiKey;
    public $apiSecret;
    public $country;
    public $version;
    public $logger;

    const COUNTRY_HONGKONG = 'HK';
    const COUNTRY_PHILIPPINES = 'PH';
    const COUNTRY_SINGAPORE = 'SG';
    const COUNTRY_THAILAND = 'TH';
    const COUNTRY_TAIWAN = 'TW';

    const VERSION_3 = 3;

    /**
     * Pass in either individual settings:
     *
     * $settings = new Settings('host.com', '1234567890', // etc...
     *
     * ... or an associative array of settings:
     *
     * $settings = new Settings(['host' => 'host.com', 'customerId' => '1234567890', 'privateKey' => // etc...
     *
     * @param string|array $host
     * @param string $apiKey
     * @param string $apiSecret
     * @param string $country
     * @param int $version
     * @param LoggerInterface|null $logger to log each request/response pair the HTTP client handles
     */
    public function __construct(
        $host,
        $apiKey = '',
        $apiSecret = '',
        $country = '',
        $version = self::VERSION_3,
        LoggerInterface $logger = null
    ) {
        $this->host       = $host;
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->country    = $country;
        $this->version    = $version;
        $this->logger     = $logger;
        if (is_array($host)) {
            foreach ($host as $key => $value) {
                $this->{$key} = !empty($value) ? $value : $this->{$key};
            }
        }
    }
}