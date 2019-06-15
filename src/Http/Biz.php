<?php

namespace JccDex\Http;

use JccDex\Router;

class Biz extends Base
{
    /**
     * Biz constructor.
     * @param $hosts
     * @param $port
     * @param $https
     */
    public function __construct($hosts, $port, $https)
    {
        parent::__construct($hosts, $port, $https);
    }

    /**
     * get sms code
     * @param string $phone
     * @param string $verifyType
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSmsCode(string $phone, string $verifyType)
    {
        $this->options['query'] = ['verifyType' => $verifyType];
        $response = $this->client->request('GET', Router::CODE_SMS_URL . self::uniqid(8) . '/' . $phone, $this->options);
        return $response->getBody();
    }
}