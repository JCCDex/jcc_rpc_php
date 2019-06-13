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
     * @param $base
     * @param $counter
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTicker($base, $counter)
    {
        $currency = strtoupper($base) . '-' . str_replace('/CNT/i', 'CNY', strtoupper($counter));
        $res = $this->client->request('GET', Router::TICKER_URL . $currency, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $res->getBody();
    }

    /**
     * get all tickers
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllTickers()
    {
        $res = $this->client->request('GET', Router::ALLTICKERS_URL, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $res->getBody();
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
        $currency = strtoupper($base) . '-' . str_replace('/CNT/i', 'CNY', strtoupper($counter));
        $res = $this->client->request('GET', Router::DEPTH_URL . $currency . '/' . $type, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $res->getBody();
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
        $currency = strtoupper($base) . '-' . str_replace('/CNT/i', 'CNY', strtoupper($counter));
        $res = $this->client->request('GET', Router::KLINE_URL . $currency . '/' . $type, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $res->getBody();
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
        $res = $this->client->request('GET', Router::HISTORY_URL . $currency . '/' . $type, [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'query' => $params
        ]);
        return $res->getBody();
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
        $res = $this->client->request('GET', '/' . strtolower($token) . '_' . strtolower($currency) . '.json', [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'query' => [
                't' => microtime(true) * 1000
            ]
        ]);
        return $res->getBody();
    }
}