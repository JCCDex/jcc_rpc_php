<?php
/**
 * Base controller
 */

namespace JccDex\Http;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use JccDex\Middleware\RequestHandler;

class Base
{
    /**
     * @var Hosts
     */
    private $hosts = [];

    /**
     * @var Https
     */
    private $https = true;

    /**
     * @var Port
     */
    private $port = 80;

    /**
     * @var Url
     */
    private $url = '';

    /**
     * @var Request
     */
    public $client;

    /**
     * @var array
     */
    public $options = [
        'headers' => [
            'Accept' => 'application/json'
        ],
    ];

    /**
     * Base constructor.
     * @param $hosts
     * @param $port
     * @param $https
     */
    public function __construct($hosts, $port, $https)
    {
        $this->hosts = $hosts;
        $this->port = $port;
        $this->https = $https;

        $handler = new CurlHandler();
        $stack = HandlerStack::create($handler);
        $stack->push(new RequestHandler());

        $this->client = new Client([
            'verify' => false,
            'base_uri' => $this->getUrl(),
            'timeout' => 3000,
            'handler' => $stack
        ]);
    }

    /**
     * @return Hosts
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * @return Port
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return Https
     */
    public function getHttps()
    {
        return $this->https;
    }

    /**
     * @return Url|string
     */
    public function getUrl()
    {
        $httpType = $this->https ? 'https://' : 'http://';
        if (is_array($this->hosts) && !empty($this->hosts)) {
            $randomIndex = count($this->hosts) > 1 ? mt_rand(0, count($this->hosts) - 1) : 0;
            $randomHost = $this->hosts[$randomIndex];
            $this->url = $httpType . $randomHost . ':' . $this->port;
        } else {
            $this->url = $httpType . $this->hosts . ':' . $this->port;
        }
        return $this->url;
    }

    /**
     * Generate random decimals
     * @param int $min
     * @param int $max
     * @return float|int
     */
    public static function randFloat($min = 0, $max = 1)
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

    /**
     * uniqid gives 13 chars, but you could adjust it to your needs.
     * @param int $lenght
     * @return bool|string
     * @throws \Exception
     */
    public static function uniqid($lenght = 13)
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }

    /**
     * error response
     * @param $e
     * @param string $type
     * @return array|false|string
     */
    public function errorResponse($e, $type = "json")
    {
        $data = [
            'code' => $e->getCode(),
            'msg' => $e->getMessage(),
            'data' => [],
            'success' => false
        ];
        return $type === 'json' ? json_encode($data) : $data;
    }
}