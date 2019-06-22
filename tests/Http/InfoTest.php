<?php


namespace JccDex\Tests;


use JccDex\Http\Info;
use PHPUnit\Framework\TestCase;

class InfoTest extends TestCase
{
    private $info;
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->info = new Info(["i3b44eb75ef.jccdex.cn", "i059e8792d5.jccdex.cn", "i352fb2ef56.jccdex.cn"], 443, true);
    }

    public function testGetAllTicker()
    {
        $response = $this->info->getAllTickers();
        $this->assertJson($response);
    }

    public function testGetTicker()
    {
        $response = $this->info->getTicker('SWT', 'CNY.jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF');
        $this->assertJson($response);
    }

    public function testGetDepth()
    {
        $response = $this->info->getDepth('JJCC-SWT', 'CNT.jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF', 'hour');
        $this->assertJson($response);
    }
}