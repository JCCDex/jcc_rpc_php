<?php

namespace JccDex\Http;

use JccDex\Router;

class Exchange extends Base
{
    /**
     * Exchange constructor.
     * @param $hosts
     * @param $port
     * @param $https
     */
    public function __construct($hosts, $port, $https)
    {
        parent::__construct($hosts, $port, $https);
    }

    /**
     * get balances
     * @param string $address
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBalances(string $address)
    {
        $response = $this->client->request('GET', Router::BALANCE_URL . $address, $this->options);
        return $response->getBody();
    }

    /**
     * get historic transactions
     * @param string $address
     * @param int $ledger
     * @param int $seq
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHistoricTransactions(string $address, int $ledger, int $seq)
    {
        $params = intval($ledger) && intval($seq) ? ['ledger' => $ledger, 'seq' => $seq] : [];
        $this->options['query'] = $params;
        $response = $this->client->request('GET', Router::TX_URL . $address, $this->options);
        return $response->getBody();
    }

    /**
     * get historic payments
     * @param string $address
     * @param int $ledger
     * @param int $seq
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHistoricPayments(string $address, int $ledger, int $seq)
    {
        $params = intval($ledger) && intval($seq) ? ['ledger' => $ledger, 'seq' => $seq] : [];
        $this->options['query'] = $params;
        $response = $this->client->request('GET', Router::PAYMENTS_URL . $address, $this->options);
        return $response->getBody();
    }

    /**
     * get orders
     * @param string $address
     * @param int $page
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOrders(string $address, int $page)
    {
        $response = $this->client->request('GET', Router::ORDERS_URL . $address . '/' . $page, $this->options);
        return $response->getBody();
    }

    /**
     * create order
     * @param string $sign
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createOrder(string $sign)
    {
        $this->options['form_params'] = ['sign' => $sign];
        $response = $this->client->request('POST', Router::SIGN_ORDER_URL, $this->options);
        return $response->getBody();
    }

    /**
     * delete order
     * @param string $sign
     * @return \Psr\Http\Message\StreamInterface
     */
    public function deleteOrder(string $sign)
    {
        $this->options['form_params'] = ['sign' => $sign];
        $response = $this->client->delete(Router::SIGN_CANCEL_ORDER_URL, $this->options);
        return $response->getBody();
    }

    /**
     * get sequeue
     * @param string $address
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSequence(string $address)
    {
        $response = $this->client->request('GET', Router::SEQUENCE_URL . $address, $this->options);
        return $response->getBody();
    }

    /**
     * transfer account
     * @param string $sign
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function transferAccount(string $sign)
    {
        $this->options['form_params'] = ['sign' => $sign];
        $response = $this->client->request('POST', Router::SIGN_PAYMENT_URL, $this->options);
        return $response->getBody();
    }

}