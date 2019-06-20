<?php

namespace JccDex\Http;

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
     * get ticker info
     * @param string $base
     * @param string $counter
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTicker(string $base, string $counter)
    {
        $currency = strtoupper($base) . '-' . str_replace('/CNT/i', 'CNY', strtoupper($counter));
        $response = $this->client->request('GET', Router::TICKER_URL . $currency, $this->options);
        return $response->getBody();
    }

    /**
     * get all tickers
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllTickers()
    {
        $response = $this->client->request('GET', Router::ALLTICKERS_URL, $this->options);
        return $response->getBody();
    }

    /**
     * get depth
     * @param string $base
     * @param string $counter
     * @param string $type
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepth(string $base, string $counter, string $type)
    {
        $currency = strtoupper($base) . '-' . str_replace('/CNT/i', 'CNY', strtoupper($counter));
        $response = $this->client->request('GET', Router::DEPTH_URL . $currency . '/' . $type, $this->options);
        return $response->getBody();
    }

    /**
     * get kline
     * @param string $base
     * @param string $counter
     * @param string $type
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getKline(string $base, string $counter, string $type)
    {
        $currency = strtoupper($base) . '-' . str_replace('/CNT/i', 'CNY', strtoupper($counter));
        $response = $this->client->request('GET', Router::KLINE_URL . $currency . '/' . $type, $this->options);
        return $response->getBody();
    }

    /**
     * get history
     * @param string $base
     * @param string $counter
     * @param string $type
     * @param string $time
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHistory(string $base, string $counter, string $type, string $time)
    {
        $currency = strtoupper($base) . '-' . str_replace('/CNT/i', 'CNY', strtoupper($counter));
        $params = $type === 'newest' ? ['time' => $time] : [];
        $this->options['query'] = $params;
        $response = $this->client->request('GET', Router::HISTORY_URL . $currency . '/' . $type, $this->options);
        return $response->getBody();
    }

    /**
     * get ticker from cmc
     * @param string $token
     * @param string $currency
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTickerFromCMC(string $token, string $currency)
    {
        $this->options['query'] = ['t' => microtime(true) * 1000];
        $response = $this->client->request('GET', '/' . strtolower($token) . '_' . strtolower($currency) . '.json', $this->options);
        return $response->getBody();
    }
}