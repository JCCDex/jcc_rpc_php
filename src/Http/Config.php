<?php
/**
 * 获取配置类
 */

namespace JccDex\Http;

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
        $res = $this->client->request('GET', Router::CONFIG_URL, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $res->getBody();
        // return json_decode($res->getBody(), true);
    }

}