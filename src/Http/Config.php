<?php
/**
 * 获取配置类
 */

namespace JxxDev\JccRpc\Http;

use JxxDev\JccRpc\Router;

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
        $res = $this->client->request('GET', $this->getUrl() . Router::CONFIG_URL, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        $data = $res->getBody();
        return $data;
        // return json_decode($data, true);
    }

}