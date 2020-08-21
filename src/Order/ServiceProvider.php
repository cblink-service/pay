<?php

/*
 * This file is part of the cblink-service/pay.
 *
 * (c) Nick <i@xieying.vip>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\Service\Payment\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['order'] = function ($app) {
            return new Client($app);
        };
    }
}
