<?php

namespace Cblink\Service\Payment\Refund;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['refund'] = function($app){
            return new Client($app);
        };
    }
}