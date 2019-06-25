<?php


namespace JccDex\Tests;


use JccDex\Http\Config;
use JccDex\Http\Exchange;
use PHPUnit\Framework\TestCase;

class ExchangeTest extends TestCase
{
    private $exchange;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->exchange = new Exchange(['ewdjbbl8jgf.jccdex.cn'], 443, true);
    }

    public function testGetBalances()
    {
        $response = $this->exchange->getBalances('jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF');
        $this->assertJson($response, '获取成功');
    }

    public function testGetHistoricTransactions()
    {
        $response = $this->exchange->getHistoricTransactions('jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF');
        $this->assertJson($response, '获取成功');
    }

    public function testGetHistoricPayments()
    {
        $response = $this->exchange->getHistoricPayments('jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF');
        $this->assertJson($response, '获取成功');
    }

    public function testGetOrders()
    {
        $response = $this->exchange->getOrders('jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF', 1);
        $this->assertJson($response, '获取成功');
    }

    public function testCreateOrder()
    {
        $response = $this->exchange->createOrder('jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF');
        $this->assertJson($response, '获取成功');
    }

    public function testDeleteOrder()
    {
        $response = $this->exchange->deleteOrder('jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF');
        $this->assertJson($response, '获取成功');
    }

    public function testGetSequence()
    {
        $response = $this->exchange->getSequence('jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF');
        $this->assertJson($response, '获取成功');
    }

    public function testTransferAccount()
    {
        $response = $this->exchange->getSequence('jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF');
        $this->assertJson($response, '获取成功');
    }

}