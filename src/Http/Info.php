<?php

namespace JccDex\Http;

use GuzzleHttp\Exception\ClientException;
use JccDex\Router;

class Info extends Base
{
    /**
     * Info constructor.
     * @param $hosts
     * @param $port
     * @param $https
     */
    public function __construct($hosts, $port, $https)
    {
        parent::__construct($hosts, $port, $https);
    }

    /**
     * get all tickers
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllTickers()
    {
        try {
            $response = $this->client->request('GET', Router::ALLTICKERS_URL, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get ticker info
     * @param $base
     * @param $counter
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTicker($base, $counter)
    {
        try {
            $currency = strtoupper($base) . '-' . str_replace('CNT', 'CNY', strtoupper($counter));
            $response = $this->client->request('GET', Router::TICKER_URL . $currency, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get depth
     * @param $base
     * @param $counter
     * @param $type
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepth($base, $counter, $type)
    {
        try {
            $currency = strtoupper($base) . '-' . str_replace('CNT', 'CNY', strtoupper($counter));
            $response = $this->client->request('GET', Router::DEPTH_URL . $currency . '/' . $type, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get kline
     * @param $base
     * @param $counter
     * @param $type
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getKline($base, $counter, $type)
    {
        try {
            $currency = strtoupper($base) . '-' . str_replace('CNT', 'CNY', strtoupper($counter));
            $response = $this->client->request('GET', Router::KLINE_URL . $currency . '/' . $type, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get history
     * @param $base
     * @param $counter
     * @param $type
     * @param $time
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHistory($base, $counter, $type, $time)
    {
        try {
            $currency = strtoupper($base) . '-' . str_replace('CNT', 'CNY', strtoupper($counter));
            $params = $type === 'newest' ? ['time' => $time] : [];
            $this->options['query'] = $params;
            $response = $this->client->request('GET', Router::HISTORY_URL . $currency . '/' . $type, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get ticker from cmc
     * @param $token
     * @param $currency
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTickerFromCMC($token, $currency)
    {
        try {
            $this->options['query'] = ['t' => microtime(true) * 1000];
            $response = $this->client->request('GET', '/' . strtolower($token) . '_' . strtolower($currency) . '.json', $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }
}