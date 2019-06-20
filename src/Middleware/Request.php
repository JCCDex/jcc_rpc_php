<?php


namespace JccDex\Middleware;

use Psr\Http\Message\RequestInterface;

class HMACRequestHandler
{
    /**
     * @var Key
     */
    private $key;

    /**
     * @var Secret
     */
    private $secret;

    /**
     * HMACRequestHandler constructor.
     * @param $key
     * @param $secret
     */
    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * @param callable $handler
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            $dateStr = Carbon::now()->format('D, d M Y H:i:s e');
            $signature = $this->generateSignature(sprintf("date: %s", $dateStr));
            $request = $request->withAddedHeader('Date', $dateStr);
            $headerValue = 'Signature keyId="%s",algorithm="hmac-sha1",signature="%s"';
            $request = $request->withAddedHeader(
                'Authorization',
                sprintf($headerValue, $this->key, $signature)
            );
            return $handler($request, $options);
        };
    }

    /**
     * @param $payload
     * @return string
     */
    private function generateSignature($payload)
    {
        $signature = hash_hmac("sha1", $payload, $this->secret, true);
        $signature = base64_encode($signature);
        $signature = rawurlencode($signature);
        return $signature;
    }
}