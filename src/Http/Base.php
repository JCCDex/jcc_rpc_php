<?php
/**
 * 基础控制器
 */

namespace JccDex\Http;

use GuzzleHttp\Client;

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
    private $port = '80';

    /**
     * @var Url
     */
    private $url = '';

    /**
     * @var Request
     */
    public $client;

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
        $this->client = new Client(['verify' => false,  'base_uri' => $this->getUrl(), 'timeout' => 3.0]);
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
        if (is_array($this->hosts) && !empty($this->hosts)) {
            $httpType = $this->https ? 'https://' : 'http://';
            $randomIndex = count($this->hosts) > 1 ? mt_rand(0, count($this->hosts) - 1) : 0;
            $randomHost = $this->hosts[$randomIndex];
            $this->url = $httpType . $randomHost . ':' . $this->port;
        }
        return $this->url;
    }

    /**
     * 生产随机小数
     * @param int $min
     * @param int $max
     * @return float|int
     */
    public static function randFloat($min = 0, $max = 1)
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

}