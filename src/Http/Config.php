<?php
/**
 * 获取配置类
 */

namespace JccDex\Http;

use GuzzleHttp\Exception\ClientException;
use JccDex\Router;

class Config extends Base
{
    /**
     * Config constructor.
     * @param $hosts
     * @param $port
     * @param $https
     */
    public function __construct($hosts, $port, $https)
    {
        parent::__construct($hosts, $port, $https);
    }

    /**
     * get config
     * @return mixed
     */
    public function getConfig()
    {
        try {
            $response = $this->client->request('GET', Router::CONFIG_URL, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

}