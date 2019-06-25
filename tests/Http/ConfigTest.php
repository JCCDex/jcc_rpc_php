<?php


namespace JccDex\Tests;


use JccDex\Http\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    private $config;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->config = new Config("jccdex.cn", 443, true);
    }

    public function testGetConfig()
    {
        $response = $this->config->getConfig();
        $this->assertJson($response, '获取配置');
    }
}