<?php


namespace JccDex\Tests;


use JccDex\Http\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testGetConfig()
    {
        $config = new Config("jccdex.cn", 443, true);
        $response = $config->getConfig();
        $this->assertJson($response, '获取配置');
    }
}