<?php


namespace JccDex\Middleware;

use Psr\Http\Message\RequestInterface;

class HMACRequestHandler
{
    /**
     * @param callable $handler
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            return $handler($request, $options);
        };
    }
}