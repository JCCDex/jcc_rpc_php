<?php

namespace JccDex\Http;

use GuzzleHttp\Exception\ClientException;
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
     * @param $address
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBalances($address)
    {
        try {
            $response = $this->client->request('GET', Router::BALANCE_URL . $address, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get historic transactions
     * @param $address
     * @param int $ledger
     * @param int $seq
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHistoricTransactions($address, int $ledger, int $seq)
    {
        try {
            $params = intval($ledger) && intval($seq) ? ['ledger' => $ledger, 'seq' => $seq] : [];
            $this->options['query'] = $params;
            $response = $this->client->request('GET', Router::TX_URL . $address, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get historic payments
     * @param $address
     * @param int $ledger
     * @param int $seq
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHistoricPayments($address, int $ledger, int $seq)
    {
        try {
            $params = intval($ledger) && intval($seq) ? ['ledger' => $ledger, 'seq' => $seq] : [];
            $this->options['query'] = $params;
            $response = $this->client->request('GET', Router::PAYMENTS_URL . $address, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get orders
     * @param $address
     * @param int $page
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOrders($address, int $page)
    {
        try {
            $response = $this->client->request('GET', Router::ORDERS_URL . $address . '/' . $page, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * create order
     * @param $sign
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createOrder($sign)
    {
        try {
            $this->options['form_params'] = ['sign' => $sign];
            $response = $this->client->request('POST', Router::SIGN_ORDER_URL, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * delete order
     * @param $sign
     * @return \Psr\Http\Message\StreamInterface
     */
    public function deleteOrder($sign)
    {
        try {
            $this->options['form_params'] = ['sign' => $sign];
            $response = $this->client->delete(Router::SIGN_CANCEL_ORDER_URL, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get sequeue
     * @param $address
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSequence($address)
    {
        try {
            $response = $this->client->request('GET', Router::SEQUENCE_URL . $address, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * transfer account
     * @param $sign
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function transferAccount($sign)
    {
        try {
            $this->options['form_params'] = ['sign' => $sign];
            $response = $this->client->request('POST', Router::SIGN_PAYMENT_URL, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

}