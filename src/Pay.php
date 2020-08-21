<?php

namespace Cblink\Service\Payment;

use Closure;
use Cblink\Service\Kennel\ServiceContainer;

/**
 * Class Pay
 * @package Cblink\Service\Payment
 *
 * @property-read App\Client    $app         应用管理
 * @property-read Order\Client  $order       订单
 * @property-read Refund\Client $refund      退单
 */
class Pay extends ServiceContainer
{

    protected function getCustomProviders(): array
    {
        return [
            App\ServiceProvider::class,
            Refund\ServiceProvider::class,
            Order\ServiceProvider::class,
        ];
    }

    /**
     * @param Closure $closure
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function notifyPaidHandle(Closure $closure)
    {
        return (new Notify($this))->handle($closure);
    }
}