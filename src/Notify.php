<?php

namespace Cblink\Service\Payment;

use Closure;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

class Notify
{
    /**
     * @var Pay
     */
    protected $app;

    public function __construct(Pay $app)
    {
        $this->app = $app;
    }

    public function handle(Closure $closure)
    {
        $data = $this->getData();

        $this->validate($data);

        return new Response($closure($data) ? 'SUCCESS' : 'FAILED');
    }

    public function validate($data)
    {
        $sign = $data['sign'];

        unset($data['sign']);

        $secret = $this->app->config->get('secret');

        ksort($data);

        $signString = urldecode(http_build_query($data)) . $secret;

        if (strtoupper(hash_hmac('sha1', $signString, $secret)) !== strtoupper($sign)) {
            throw new InvalidArgumentException('sign error');
        }
    }

    public function getData()
    {
        $data = $this->app->request->getContent();

        $data = json_decode($data, true);

        if (json_last_error() || !isset($data['sign'])) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}